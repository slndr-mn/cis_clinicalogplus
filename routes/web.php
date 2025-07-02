<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('landing');
});

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login');

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



  