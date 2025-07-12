<?php

namespace App\Mail;

use Illuminate\Database\Eloquent\Model;

interface Blokerator
{

    /**
     * Bloking something
     */
    public function block($mail);

    /**
     * unblocking something
     */
    public function unblock($mail);
}
