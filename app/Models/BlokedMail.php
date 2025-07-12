<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class BlokedMail extends Model
{
    public $email;
    public $date;

    public function __construct(array $atributes = [])
    {
        $this->date = Date::now();
    }

    public $fillable = ['email'];
}
