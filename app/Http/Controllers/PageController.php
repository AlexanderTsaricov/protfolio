<?php

namespace App\Http\Controllers;

use App\Models\CodeSnippet;
use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello()
    {
        return view('welcome');
    }

    public function about($selectedMenu)
    {
        $codes = CodeSnippet::all();
        return view('about', ['selectedMenu' => $selectedMenu, 'codes' => $codes]);
    }

    public function projects()
    {
        return view('projects');
    }

    public function contactMe()
    {
        return view('contact-me', ['blocked' => false]);
    }
}
