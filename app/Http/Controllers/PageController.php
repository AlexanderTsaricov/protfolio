<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
}
