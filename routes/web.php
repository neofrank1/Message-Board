<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Blogs Routes
Route::get('/blogs',[BlogController::class, 'index'])->name('blogs.index');
Route::post('/blogs/create',[BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs/store',[BlogController::class, 'store'])->name('blogs.store');

// User Routes
Route::get('/profile',[UserController::class, 'index'])->name('users.profile');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');