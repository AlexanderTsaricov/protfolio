<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface TextAboutMeServiceInterface
{
    public function add(string $name, string $text);

    public function delete(string $name);

    public function get(string $name):Model;

    public function edit(Model $textAboutMe, string $parameter, string $changedData);

    public function has(string $name):bool;
}