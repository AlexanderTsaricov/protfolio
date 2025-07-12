<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class BlokedMail extends Model
{
    protected $fillable = ['email'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->date = now();
        });
    }
}
