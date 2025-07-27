<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageInfo extends Model
{
    protected $table = 'languages_info';
    protected $fillable = ['name', 'text'];
}
