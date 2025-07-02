<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        return view('admin.dashboard', compact('admin'));
    }

}
 