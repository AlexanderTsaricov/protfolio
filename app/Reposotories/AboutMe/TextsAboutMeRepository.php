<?php

namespace App\Reposotories\AboutMe;

use App\Models\TextAboutMe;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class TextsAboutMeRepository implements TextsAboutMeRepositoryInterface 
{
    

    /**
     * @inheritDoc
     */
    public function add(string $text, string $name): TextAboutMe {
        $newText = new TextAboutMe($name, $text);
        return $newText;
    }

    /**
     * @inheritDoc
     */
    public function edit(Model $textAboutMe, string $parameter, string $changeString): Model {
        switch ($parameter)
        {
            case 'name':
                $textAboutMe->setName($changeString);
                break;
            case 'text':
                $textAboutMe->setText($changeString);
                break;
            default:
                new InvalidParameterException("This model don`t have parameter $parameter");
                break;
        }

        $textAboutMe->save();
        return $textAboutMe;

    }

    /**
     * @inheritDoc
     */
    public function remove(string $name) 
    {
        TextAboutMe::where('name', $name)->first()->remove();
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): Model|null 
    {
        $textAboutMe = TextAboutMe::where('name', $name)->first();
        return $textAboutMe;
    }
}