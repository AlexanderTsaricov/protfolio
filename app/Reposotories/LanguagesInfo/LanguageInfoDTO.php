<?php

namespace App\Reposotories\LanguagesInfo;

class LanguageInfoDTO
{
    public string $name;
    public ?string $text;

    public ?string $type;

    public ?string $changedArg;

    public ?string $changedArgName;

    public ?string $id;
    
    public function __construct(string $name, ?string $type = null, ?string $text = null, ?string $changedArg = null, ?string $changedArgName = null, ?string $id = null) {
        $this->name = $name;
        $this->text = $text;
        $this->type = $type;
        $this->changedArg = $changedArg;
        $this->changedArgName = $changedArgName;
        $this->id = $id;

    }
}