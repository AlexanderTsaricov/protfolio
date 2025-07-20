<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextAboutMe extends Model
{

    protected $table = 'texts_about_me';
    protected $fillable = ['text', 'name'];

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

}
