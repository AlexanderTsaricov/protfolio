<?php

namespace App\Exeptions;

use Exception;

class DontHaveModelExeption extends Exception
{
    public function __construct($message = "Table dont have this")
    {
        parent::__construct($message);
    }
}