<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Middleware\LoginAuth;

Route::get('/login', [UsersController::class, 'index'])->name('login');
Route::middleware(LoginAuth::class)->group(function () {
    Route::get('/reservation', [ReservationsController::class, 'index']);
});
