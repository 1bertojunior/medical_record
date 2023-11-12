<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::middleware('level_access')->prefix('/app')->group(function() {
    Route::get('/admin', [AppController::class, 'admin'])->name('app.admin');
});
