<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextAboutMe extends Model
{

    protected $table = 'texts_about_me';
    protected $fillable = ['text', 'name', 'type', 'subtype'];

    public function getText() {
        return $this->text;
    }

    public function setText(string $text) {
        $this->text = $text;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getSubtype()
    {
        return $this->subtype;
    }

    public function setSubtype(string $subtype)
    {
        $this->subtype = $subtype;
    }

}
