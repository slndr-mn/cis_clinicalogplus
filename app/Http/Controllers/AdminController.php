<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StaffUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{ 
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Get logged-in admin
        $userId = $admin->user_idnum;

        // Fetch more data if needed
        //$logs = Log::where('admin_id', $userId)->latest()->get();

        $adminusers = StaffUser::all();

        return view('admin.dashboard', ['admin' => $admin, 'adminusers' => $adminusers]);
    }

} 
 