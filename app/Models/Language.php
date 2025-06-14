<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];

    /**
     * Найти проекты, где JSON-массив languages содержит этот ID
     */
    public function projects()
    {
        return Project::whereJsonContains('languages', $this->id)->get();
    }
}
