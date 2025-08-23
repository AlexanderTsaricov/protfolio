<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use App\Models\Language;
use App\Models\Project;
use App\Services\LanguageInfoService;
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
        $languageService = new LanguageInfoService();
        $arrayModels = [];
        $detailsArray = [];
        $arrayLanguageByTypeElemets = [];
        $detailsLanguageArray = [];
        $filtredByMenu = $service->getAll()->filter(function ($text) use ($selectedMenu) {
            return $text->getType() == $selectedMenu;
        });

        foreach ($filtredByMenu as $model) {
            $arrayModels[$model->getSubtype()][] = ['id' => $model->getName(), 'name' => $model->getName(), 'text' => $this->separateTextToArray($model->getText(), 29)];
        }

        foreach (array_keys($arrayModels) as $key) {
            $detailsArray[] = new Details($key, $arrayModels[$key]);
        }

        if ($selectedMenu == 'professional-info') {
            $languageModels = $languageService->getAll();
            foreach ($languageModels as $model) {
                $arrayLanguageByTypeElemets[$model['type']][] = [
                    'id' => $model['name'],
                    'name' => $model['name'],
                    'text' => $this->separateTextToArray($model['text'], 29)
                ];
            }

            foreach (array_keys($arrayLanguageByTypeElemets) as $key) {
                $detailsLanguageArray[] = new Details($key, $arrayLanguageByTypeElemets[$key]);
            }

            $lanuageBigDetails = new Details('Languages', null, $detailsLanguageArray);
            $detailsArray[] = $lanuageBigDetails;
        }

        $headDetails = new Details($selectedMenu, null, $detailsArray);

        return view('about', ['selectedMenu' => $selectedMenu, 'codes' => $codes, 'details' => $headDetails]);
    }

    public function projects()
    {

        return view('projects');
    }

    public function contactMe()
    {
        return view('contact-me', ['blocked' => false, 'captchaId' => 1, 'captchaSrc' => 'storage/captches/1.png']);
    }
}
