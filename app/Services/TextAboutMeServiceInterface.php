<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface TextAboutMeServiceInterface
{
    public function add(string $name, string $text, string $type, string $subtype);

    public function delete(string $name);

    public function get(string $name):Model;

    public function edit(Model $textAboutMe, string $parameter, string $changedData);

    public function has(string $name):bool;

    public function getAll();
}