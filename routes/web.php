<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\StaffUserController;
use App\Models\StaffUser;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing');
});


// ==============================
// Auth Routes (Login, OTP, Password Reset)
// ==============================

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('loginstore');

// Two-Factor Authentication
Route::get('/two-factor-auth', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/two-factor-auth', [AuthController::class, 'verifyOtp'])->name('otp.verify');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// ==============================
// Admin Routes (Protected by auth:admin)
// ============================== 
Route::middleware('auth:admin')->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Logout
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout'); 

    // Patient Records
    Route::get('/admin/patientRecord', [PatientRecordController::class, 'index'])->name('patientRecord');
    Route::get('/patientRecordstud', fn() => view('admin.patientRecordstud'))->name('patientRecordstud');
    Route::get('/patientRecordfac', fn() => view('admin.patientRecordfac'))->name('patientRecordfac');
    Route::get('/patientRecordstaff', fn() => view('admin.patientRecordstaff'))->name('patientRecordstaff');
    Route::get('/patientRecordexten', fn() => view('admin.patientRecordexten'))->name('patientRecordexten');

    // Add Patient Records
    Route::get('/addStudent', fn() => view('admin.addStudent'))->name('addStudent'); 
    Route::get('/addFaculty', fn() => view('admin.addFaculty'))->name('addFaculty');
    Route::get('/addStaff', fn() => view('admin.addStaff'))->name('addStaff');
    Route::get('/addExtension', fn() => view('admin.addExtension'))->name('addExtension');

    // Medicine Records
    Route::get('/medicine-record', [MedicineController::class, 'index'])->name('medicineRecord'); 
    Route::post('/medicine-record/update', [MedicineController::class, 'save'])->name('admin.addmedicine'); 
    Route::post('/medicine-record/addmedstock', [MedicineController::class, 'storemedstock'])->name('admin.addmedstock'); 
    Route::post('/medicine-record/upmedstock', [MedicineController::class, 'updateMedstock'])->name('admin.upmedstock'); 
    Route::delete('/medicine-record', [MedicineController::class, 'delete'])->name('admin.medstockdelete');

    // Staff Users
    Route::get('/staff-users', [StaffUserController::class, 'index'])->name('admin.staffuser');
    Route::post('/staff-users/update', [StaffUserController::class, 'update'])->name('admin.update'); 
    Route::post('/staff-users/add', [StaffUserController::class, 'add'])->name('admin.staffadd');
    Route::delete('/staff-users/delete', [StaffUserController::class, 'delete'])->name('admin.staffdelete');

    Route::get('/profile-image/{filename}', [ProfileController::class, 'show'])->name('profile-image');

});


// ==============================
// Client Routes (Protected by auth:patient)
// ==============================
Route::middleware('auth:patient')->group(function () {

    // Dashboard
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');

    // Logout
    Route::post('/client/logout', [ClientController::class, 'clientLogout'])->name('client.logout');
});
