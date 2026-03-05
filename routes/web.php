<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('authors', AuthorController::class)
    ->only(['index','create','store','show','edit','update','destroy'])
    ->names('admin.authors');
    Route::resource('users', UserController::class)
    ->only(['index','create','store','show','edit','update','destroy'])
    ->names('admin.users');
});



