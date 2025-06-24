<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    protected static function booted(): void
    {
        static::saved(function (Project $project) {
            Cache::forget('projects.all');
        });

        static::deleted(function (Project $project) {
            Cache::forget('projects.all');
        });
    }
}
