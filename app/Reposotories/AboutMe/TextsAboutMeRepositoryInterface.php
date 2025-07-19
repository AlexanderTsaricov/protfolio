<?php

namespace App\Reposotories\AboutMe;
use Illuminate\Database\Eloquent\Model;

interface TextsAboutMeRepositoryInterface 
{
    /**
     * Add row to table texts_about_me
     * @return string
     */
    public function add(string $text, string $name):Model;

    /**
     * Delete row from table texts_about_me
     * @param string $name name of TextAboutMe
     * @return void
     */
    public function remove(string $name);

    /**
     * Edit row in table tests_about_me
     * @param \Illuminate\Database\Eloquent\Model $textAboutMe TextAboutMe class instance 
     * @param string $parameter parameter TextAboutMe instance what need edit
     * @param string $changeString new string what need add in parameter $parameter
     * @return void
     */
    public function edit(Model $textAboutMe, string $parameter, string $changeString): Model;

    public function get(string $name): Model|null;

}

