<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeSnippet extends Model
{
    protected $table = 'codes';
    protected $fillable = ['code']; 
}
