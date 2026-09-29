<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{nama}/{NPM}/{kelas}', [ProfileController::class, 'profile']);
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');