<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\LoginAuth;

Route::get('/login', [UsersController::class, 'index'])->name('login');
Route::middleware(LoginAuth::class)->group(function () {
    Route::match(['get', 'post'], '/', [ReservationsController::class, 'index'])->name('reservation');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/checktables', [ReservationsController::class, 'checkTablesAvailability'])->name('checktables');
    Route::post('/store', [ReservationsController::class, 'store'])->name('store');
});
