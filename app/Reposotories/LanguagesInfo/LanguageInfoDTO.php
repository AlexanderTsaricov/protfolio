<?php

namespace App\Reposotories\LanguagesInfo;

class LanguageInfoDTO
{
    public string $name;
    public ?string $text;

    public string $type;

    public ?string $changedArg;

    public ?string $changedArgName;
    
    public function __construct(string $name, string $type, ?string $text = null, ?string $changedArg = null, ?string $changedArgName) {
        $this->name = $name;
        $this->text = $text;
        $this->type = $type;
        $this->changedArg = $changedArg;
        $this->changedArgName = $changedArgName;
    }
}