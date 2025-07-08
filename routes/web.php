<?php

use App\Http\Controllers\PatientRecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PatientRecordController;


Route::get('/', function () {
    return view('landing');
});

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('loginstore');

Route::get('/two-factor-auth', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/two-factor-auth', [AuthController::class, 'verifyOtp'])->name('otp.verify');



Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// Admin dashboard routes (requires guard:admin)
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
});


// Admin dashboard routes (requires guard:admin)
Route::middleware('auth:patient')->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    Route::post('/client/logout', [ClientController::class, 'clientLogout'])->name('client.logout');
});

// Route for Patient Record
// Route::get('/patient-record', function () {
//     return view('admin.patientRecord');
// })->name('patientRecord');
Route::get('/patientRecord', [PatientRecordController::class, 'index'])->name('admin.patientRecord');

// // Route for Medicine Record
Route::get('/medicine-record', function () {
    return view('admin.medicineRecord');
})->name('medicineRecord');


Route::get('/staff-users', function () {
    return view('admin.staffuser');
})->name('admin.staffuser');


