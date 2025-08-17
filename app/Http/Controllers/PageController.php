<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use App\Models\Language;
use App\Models\Project;
use App\Services\TextAboutMeService;
use Illuminate\Http\Request;
use App\Http\Classes\Details;

class PageController extends Controller
{
    public function hello()
    {
        return view('welcome');
    }

    private function separateTextToArray(String $text, int $countLetters)
    {
        $words = preg_split('/\s+/', trim($text));
        $chunks = [];
        $index = 0;
        $chunks[$index] = '';
        foreach ($words as $word) {
            $chunks[$index] .= $word . ' ';
            if (strlen($chunks[$index]) > $countLetters) {
                $index += 1;
                $chunks[$index] = '';
            }
        }

        return $chunks;
    }

    public function about($selectedMenu)
    {
        $codes = CodeSnippet::all();
        $service = new TextAboutMeService();
        $filtredByMenu = $service->getAll()->filter(function ($text) use ($selectedMenu) {
            return $text->getType() == $selectedMenu;
        });

        $groupedBySubtype = $filtredByMenu->groupBy(function ($model) {
            return $model->getSubtype();
        });

        $smallDetailsArray = $groupedBySubtype->map(function ($group, $subtype) {
            $elements = $group->map(function ($model) {
                return [
                    'id' => $model->getName(),
                    'name' => $model->getName(),
                    'text' => $this->separateTextToArray($model->getText(), 29)
                ];
            })->values()->all();

            return new Details(
                $subtype,
                $elements,
                null
            );
        })->values()->all();

        $details = new Details(
            $selectedMenu,
            null,
            $smallDetailsArray
        );

        return view('about', ['selectedMenu' => $selectedMenu, 'codes' => $codes, 'details' => $details]);
    }

    public function projects()
    {
        return view('projects');
    }

    public function contactMe()
    {
        return view('contact-me', ['blocked' => false]);
    }
}
