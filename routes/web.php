<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('app.showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('app.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('app.logout');

Route::middleware('authentication')->prefix('/app')->group(function() {
    Route::get('/admin', [AppController::class, 'admin'])->name('app.admin');
    Route::get('/users', [AppController::class, 'users'])->name('app.users');
});
