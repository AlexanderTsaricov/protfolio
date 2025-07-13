<?php

namespace App\Exeptions;

use Exception;

class AlredyBlockedExeption extends Exception
{

    public function __construct(string $message = "This entity is already blocked.")
    {
        parent::__construct($message);
    }
}
