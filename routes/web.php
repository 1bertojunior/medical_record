<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::middleware('authentication')->prefix('/app')->group(function() {
    Route::get('/admin', [AppController::class, 'admin'])->name('app.admin');
});
