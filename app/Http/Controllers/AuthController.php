<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Models\StaffUser;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => ['required', 'email'],
            'user_password' => ['required'],
        ]);

        $email = strtolower($credentials['user_email']);
        $emailHash = hash('sha256', $email);

        // Try admin login first
        $admin = \App\Models\StaffUser::where('email_hash', $emailHash)->first();

        if ($admin && Hash::check($credentials['user_password'], $admin->user_password)) {
            if ($admin->user_status !== 'Active') {
                throw ValidationException::withMessages([
                    'user_email' => 'Your admin account is inactive.',
                ]);
            }

            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();

            return $this->handleUserRedirect($admin->user_role);
        }

        // Try patient login next
        $patient = \App\Models\PatientUsers::where('patient_emailhash', $emailHash)->first();

        if ($patient && Hash::check($credentials['user_password'], $patient->patient_password)) {
            if ($patient->patient_status !== 'Active') {
                throw ValidationException::withMessages([
                    'user_email' => 'Your patient account is inactive.',
                ]);
            }

            Auth::guard('patient')->login($patient);
            $request->session()->regenerate();

            return $this->handlePatientRedirect($patient->patient_patienttype);
        }

        // If both fail
        throw ValidationException::withMessages([
            'user_email' => 'Invalid credentials.',
        ]);
    }

    protected function handleUserRedirect($role)
    {
        return match ($role) {
            'Super Admin', 'Admin' => redirect('/admin/dashboard'),
            'Physician'            => redirect('/physician/dashboard'),
            default                => redirect('/'),
        };
    }

    protected function handlePatientRedirect($type)
    {
        return match ($type) {
            'Student', 'Faculty', 'Staff', 'Extension' => redirect('/client/dashboard'),
            default     => redirect('/'),
        };
    }



}


   
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('/dashboard');
    //     }

    //     return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    // }

    // public function store(){
    //     $attributes = request() ->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);

    //     Auth::attempt($attributes);

    //     request()->session()->regenerate();

    //     return redirect('/dashboard');
        
    // }

    // public function destroy(){
    //     Auth::logout();

    //     return redirect('/');
    // }

 