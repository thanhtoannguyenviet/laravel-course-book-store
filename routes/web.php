<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

// author routes (index, create, store, show)
Route::resource('authors', AuthorController::class)
    ->only(['index','create','store','show']);
