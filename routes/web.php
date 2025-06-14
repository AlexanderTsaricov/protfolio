<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'hello']);
//Route::get('/about', [PageController::class, 'about']);

Route::get('/about/{selectedMenu}', [PageController::class, 'about']);

Route::get('/getContent/{selectedContentName}', [ContentController::class, 'getContentView']);
Route::get('/getContent/codes', [ContentController::class, 'codeSnippets']);
Route::patch('/content/code-snippet/{id}', [ContentController::class, 'updateStars']);

Route::get('/projects', [PageController::class, 'projects']);
