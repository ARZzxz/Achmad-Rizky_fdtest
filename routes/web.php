<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'landing'])->name('landing');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::resource('books', BookController::class);
});

require __DIR__.'/auth.php';
