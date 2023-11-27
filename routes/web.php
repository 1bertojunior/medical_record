<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('app.showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('app.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('app.logout');

Route::middleware('authentication')->prefix('/app')->group(function() {
    Route::get('/admin', [AppController::class, 'admin'])->name('app.admin');
    
    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');

    Route::get('/users', [AppController::class, 'users'])->name('app.users');
    Route::get('users/add', [UserController::class, 'add'])->name('app.users.add');
    Route::post('users/add', [UserController::class, 'create'])->name('app.users.add');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('app.users.edit');
    Route::put('users/edit/{id}', [UserController::class, 'update'])->name('app.users.edit');

    Route::get('/patient', [AppController::class, 'patient'])->name('app.patient');
    Route::get('/patient/add', [PatientController::class, 'create'])->name('app.patient.add');
    Route::post('/patient/add', [PatientController::class, 'store'])->name('app.patient.add');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('app.patient.edit');
    Route::put('/patient/edit/{id}', [PatientController::class, 'update'])->name('app.patient.edit');

    Route::get('/healthcare_profession_type', [AppController::class, 'patient'])->name('app.healthcare_profession_type');
    Route::get('/healthcare_profession_type/add', [HealthcareProfessionTypeController::class, 'create'])->name('app.healthcare_profession_type.add');
    Route::post('/healthcare_profession_type/add', [HealthcareProfessionTypeController::class, 'store'])->name('app.healthcare_profession_type.add');
    Route::get('/healthcare_profession_type/edit/{id}', [HealthcareProfessionTypeController::class, 'edit'])->name('app.healthcare_profession_type.edit');
    Route::put('/healthcare_profession_type/edit/{id}', [HealthcareProfessionTypeController::class, 'update'])->name('app.healthcare_profession_type.edit');


});
