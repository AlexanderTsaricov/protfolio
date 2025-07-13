<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedMail extends Model implements BlockedEssence
{
    protected $fillable = ['email'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->date = now();
        });
    }

    public function getName()
    {
        return $this->email;
    }
}
