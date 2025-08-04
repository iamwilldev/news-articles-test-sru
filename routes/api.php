<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewsArticleController;

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('news-articles', [NewsArticleController::class, 'index'])->name('articles.index');
    });
});
