<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{nama}/{NPM}/{kelas}', [ProfileController::class, 'profile']);
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');

Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');