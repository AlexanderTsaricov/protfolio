<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'hello']);
Route::get('/about', [PageController::class, 'about']);

