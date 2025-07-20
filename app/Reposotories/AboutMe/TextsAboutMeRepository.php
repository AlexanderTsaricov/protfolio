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
    public function add(string $text, string $name, string $type, string $subtype): TextAboutMe {
        $newText = new TextAboutMe();
        $newText->setName($name);
        $newText->setText($text);
        $newText->setType($type);
        $newText->setSubtype($subtype);
        $newText->save();
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
            case 'type':
                $textAboutMe->setType($changeString);
                break;
            case 'subtype':
                $textAboutMe->setSubtype($changeString);
                break;
            default:
                throw new InvalidParameterException("This model don`t have parameter $parameter");
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