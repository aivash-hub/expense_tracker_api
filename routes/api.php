<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Expense\DestroyController;
use App\Http\Controllers\Expense\IndexController;
use App\Http\Controllers\Expense\ShowController;
use App\Http\Controllers\Expense\StoreController;
use App\Http\Controllers\Expense\UpdateController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/expenses', IndexController::class);
    Route::post('/expenses', StoreController::class);
    Route::get('/expenses/{id}', ShowController::class);
    Route::put('/expenses/{id}', UpdateController::class);
    Route::delete('/expenses/{id}', DestroyController::class);
});
