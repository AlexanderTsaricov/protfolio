<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'link',
        'image',
        'description',
        'languages',
    ];

    protected $casts = [
        'languages' => 'array',
    ];


    public function languageModels()
    {
        return Language::whereIn('id', $this->languages ?? [])->get();
    }
}
