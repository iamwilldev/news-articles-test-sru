<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DataMaster\ArticleController;
use App\Http\Controllers\LandingPage\LandingPageController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'index_register'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::name('landingpage.')->group(function () {
        Route::get('/', [LandingPageController::class, 'index'])->name('index');
        Route::get('/article/{article}', [LandingPageController::class, 'show'])->name('article.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
