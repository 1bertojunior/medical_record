<?php

use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealthcareProfessionalController;
use App\Http\Controllers\HealthcareProfessionTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalRecordController;
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
    Route::get('users/details/{id}', [UserController::class, 'details'])->name('app.users.details');

    Route::get('/patient', [AppController::class, 'patient'])->name('app.patient');
    Route::get('/patient/add', [PatientController::class, 'create'])->name('app.patient.add');
    Route::post('/patient/add', [PatientController::class, 'store'])->name('app.patient.add');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('app.patient.edit');
    Route::put('/patient/edit/{id}', [PatientController::class, 'update'])->name('app.patient.edit');
    Route::get('/patient/details/{id}', [PatientController::class, 'details'])->name('app.patient.details');

    Route::get('/healthcare_profession_type', [AppController::class, 'healthcareProfessionType'])->name('app.healthcare_profession_type');
    Route::get('/healthcare_profession_type/add', [HealthcareProfessionTypeController::class, 'create'])->name('app.healthcare_profession_type.add');
    Route::post('/healthcare_profession_type/add', [HealthcareProfessionTypeController::class, 'store'])->name('app.healthcare_profession_type.add');
    Route::get('/healthcare_profession_type/edit/{id}', [HealthcareProfessionTypeController::class, 'edit'])->name('app.healthcare_profession_type.edit');
    Route::put('/healthcare_profession_type/edit/{id}', [HealthcareProfessionTypeController::class, 'update'])->name('app.healthcare_profession_type.edit');
    Route::get('/healthcare_profession_type/details/{id}', [HealthcareProfessionTypeController::class, 'details'])->name('app.healthcare_profession_type.details');

    Route::get('/healthcare_professionals', [AppController::class, 'healthcareProfessionals'])->name('app.healthcare_professionals');
    Route::get('/healthcare_professionals/add', [HealthcareProfessionalController::class, 'create'])->name('app.healthcare_professionals.add');
    Route::post('/healthcare_professionals/add', [HealthcareProfessionalController::class, 'store'])->name('app.healthcare_professionals.add');
    Route::get('/healthcare_professionals/edit/{id}', [HealthcareProfessionalController::class, 'edit'])->name('app.healthcare_professionals.edit');
    Route::put('/healthcare_professionals/edit/{id}', [HealthcareProfessionalController::class, 'update'])->name('app.healthcare_professionals.edit');
    Route::delete('/healthcare_professionals/delete/{id}', [HealthcareProfessionalController::class, 'destroy'])->name('app.healthcare_professionals.delete');
    Route::get('/healthcare_professionals/details/{id}', [HealthcareProfessionalController::class, 'details'])->name('app.healthcare_professionals.details');
    
    Route::get('/medical-records', [AppController::class, 'medicalRecords'])->name('app.medical_records');
    Route::get('/medical-records/add', [MedicalRecordController::class, 'create'])->name('app.medical_records.add');
    Route::post('/medical-records/add', [MedicalRecordController::class, 'store'])->name('app.medical_records.add');
    Route::get('/medical-records/edit/{id}', [MedicalRecordController::class, 'edit'])->name('app.medical_records.edit');
    Route::put('/medical-records/edit/{id}', [MedicalRecordController::class, 'update'])->name('app.medical_records.edit');
    Route::delete('/medical-records/delete/{id}', [MedicalRecordController::class, 'destroy'])->name('app.medical_records.delete');
    Route::get('/medical-records/details/{id}', [MedicalRecordController::class, 'details'])->name('app.medical_records.details');

    Route::get('/logs-access', [AppController::class, 'logsAccess'])->name('app.logs_access');
    Route::get('/logs-access/details/{id}', [AccessLogController::class, 'details'])->name('app.logs_access.details');

});
