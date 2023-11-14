<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::post('/auth/login', [\App\Http\Controllers\Auth\LoginController::class, '__invoke']);

    // auth:sanctum middleware'i sadece giriş yapmış kullanıcılar için
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/categories', \App\Http\Controllers\Category\IndexController::class);
        Route::post('/categories', \App\Http\Controllers\Category\StoreController::class);
        Route::get('/categories/{id}/', \App\Http\Controllers\Category\ShowController::class);
        Route::put('/categories/{id}',\App\Http\Controllers\Category\UpdateController::class);
        Route::delete('/categories/{id}/',\App\Http\Controllers\Category\DeleteController::class);

        Route::get('/blogs',\App\Http\Controllers\Blog\IndexController::class);
        Route::post('/blogs',\App\Http\Controllers\Blog\StoreController::class);
        Route::get('/blogs/{id}',\App\Http\Controllers\Blog\ShowController::class);
        Route::put('/blogs/{id}',\App\Http\Controllers\Blog\UpdateController::class);
        Route::delete('/blogs/{id}/',\App\Http\Controllers\Blog\DeleteController::class);
    });
});

