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

use App\Http\Controllers\RbacController;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientUsers;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

// Dashboard or Home route
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:web'])->prefix('rbac')->name('rbac.')->group(function () {
    Route::get('/', [RbacController::class, 'index'])->name('index');
    Route::post('/update', [RbacController::class, 'update'])->name('update');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});


Route::get('/student/check-role', function () {
    /** @var PatientUsers $student */
    $student = Auth::guard('patient')->user();

    if ($student && $student->hasRole('Student')) {
        return '✅ This is a student!';
    } else {
        return '❌ Not a student';
    }
});

Route::get('/users', [UserController::class, 'index'])
    ->middleware('permission:view_user');


Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});


Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');

// Group all routes under 'auth' middleware
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/rbac', [RbacController::class, 'index'])->name('rbac.index');
    Route::post('/admin/rbac/update', [RbacController::class, 'update'])->name('rbac.update');
});

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

//ash
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

// Route for Editing Patient Record Student
Route::get('/editStudent', function () {
    return view('admin.editStudent');
})->name('editStudent');

// Route for Adding Patient Record Faculty
Route::get('/addFaculty', function () {
    return view('admin.addFaculty');
})->name('addFaculty');

// Route for Editing Patient Record Faculty
Route::get('/editFaculty', function () {
    return view('admin.editFaculty');
})->name('editFaculty');

// Route for Adding Patient Record Staff
Route::get('/addStaff', function () {
    return view('admin.addStaff');
})->name('addStaff');

// Route for Editing Patient Record Faculty
Route::get('/editStaff', function () {
    return view('admin.editStaff');
})->name('editStaff');

// Route for Adding Patient Record Extension
Route::get('/addExtension', function () {
    return view('admin.addExtension');
})->name('addExtension');

// Route for Editing Patient Record Faculty
Route::get('/editExtension', function () {
    return view('admin.editExtension');
})->name('editExtension');

//Route for Viewing Patient Profile Student
Route::get('/patientProfilestud', function () {
    return view('admin.patientProfilestud');
})->name('patientProfilestud');

// Route for Viewing Patient Profile Faculty
Route::get('/patientProfilefaculty', function () {
    return view('admin.patientProfilefaculty');
})->name('patientProfilefaculty');

// Route for Viewing Patient Profile Staff
Route::get('/patientProfilestaff', function () {
    return view('admin.patientProfilestaff');
})->name('patientProfilestaff');

// Route for Viewing Patient Profile Extension
Route::get('/patientProfileextension', function () {
    return view('admin.patientProfileextension');
})->name('patientProfileextension');

// Route for Medicine Record
Route::get('/medicine-record', function () {
    return view('admin.medicineRecord');
})->name('medicineRecord');
//ash
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
//mine


// ==============================
// Client Routes (Protected by auth:patient)
// ==============================
Route::middleware('auth:patient')->group(function () {

    // Dashboard
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');

    // Logout
    Route::post('/client/logout', [ClientController::class, 'clientLogout'])->name('client.logout');
});
