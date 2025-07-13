<?php

use App\Http\Controllers\PatientRecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Mail;



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

// Route for Patient Record (for sidebar and All button)
// Both sidebar and All button should use the same route for consistency
Route::get('/admin/patientRecord', [PatientRecordController::class, 'index'])->name('patientRecord');

// Route::get('/patientRecord', function () {
//     return view('admin.patientRecord');
// })->name('patientRecord');

// Route for Patient Record Student
Route::get('/patientRecordstud', function () {
    return view('admin.patientRecordstud');
})->name('patientRecordstud');

// Route for Patient Record Faculty
Route::get('/patientRecordfac', function () {
    return view('admin.patientRecordfac');
})->name('patientRecordfac');

// Route for Patient Record Staff
Route::get('/patientRecordstaff', function () {
    return view('admin.patientRecordstaff');
})->name('patientRecordstaff');

// Route for Patient Record Extension
Route::get('/patientRecordexten', function () {
    return view('admin.patientRecordexten');
})->name('patientRecordexten');

// Route for Adding Patient Record Student
Route::get('/addStudent', function () {
    return view('admin.addStudent');
})->name('addStudent');

// Route for Adding Patient Record Faculty
Route::get('/addFaculty', function () {
    return view('admin.addFaculty');
})->name('addFaculty');

// Route for Adding Patient Record Staff
Route::get('/addStaff', function () {
    return view('admin.addStaff');
})->name('addStaff');

// Route for Adding Patient Record Extension
Route::get('/addExtension', function () {
    return view('admin.addExtension');
})->name('addExtension');

// Route for Medicine Record
Route::get('/medicine-record', function () {
    return view('admin.medicineRecord');
})->name('medicineRecord');

Route::get('/staff-users', function () {
    return view('admin.staffuser');
})->name('admin.staffuser');



