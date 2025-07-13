<?php

namespace App\Exeptions;

use Exception;

class NotBlockedExeption extends Exception
{
    public function __construct($message = "This entity is not blocked.")
    {
        parent::__construct($message);
    }
}
