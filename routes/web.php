<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'index_register'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
