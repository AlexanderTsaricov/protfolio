<?php

namespace App\Exeptions;

use Exception;

class TableHaveThisExeption extends Exception
{
    public function __construct($message = "Table have this")
    {
        parent::__construct($message);
    }
}