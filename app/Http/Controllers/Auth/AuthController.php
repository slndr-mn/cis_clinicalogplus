<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Models\StaffUser;
use App\Models\PatientUsers;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {    
        session()->forget(['otp:type', 'otp:user:id']);
        return view('auth.login');
    }

    public function showOtpForm(){
        if (!session()->has('otp:type') || !session()->has('otp:user:id')) {
        return redirect()->route('login')->with('error', 'Session expired.');
    }
        return view('auth.otpform');
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
        $admin = StaffUser::where('email_hash', $emailHash)->first();

        if ($admin && Hash::check($credentials['user_password'], $admin->user_password)) {
            if ($admin->user_status !== 'Active') {
                throw ValidationException::withMessages([
                    'user_email' => 'Your admin account is inactive.',
                ]);
            }

            if ($request->cookie('trusted_device_admin_' . $admin->user_id)) {
                Auth::guard('admin')->login($admin);
                $request->session()->regenerate();
                return $this->handleUserRedirect($admin->user_role);
    
            }

            $otp = rand(100000, 999999);
            $admin->user_otpcode = $otp;
            $admin->user_otpexpiresat = Carbon::now()->addMinutes(5);
            $admin->save();

           

             Mail::raw("Your OTP is: $otp", function ($message) use ($admin) {
                $message->to($admin->user_email)
                        ->subject('Your OTP Code');
            });

            // Store user ID temporarily and log out 
            session(['otp:type' => 'admin', 'otp:user:id' => $admin->user_id]);
            Auth::logout(); 

             return redirect()->route('otp.form');
        }

        // Try patient login next
        $patient = PatientUsers::where('patient_emailhash', $emailHash)->first();

        if ($patient && Hash::check($credentials['user_password'], $patient->patient_password)) {
            if ($patient->patient_status !== 'Active') {
                throw ValidationException::withMessages([
                    'user_email' => 'Your patient account is inactive.',
                ]);
            }

            if ($request->cookie('trusted_device_patient_' . $patient->patient_id)) {
                Auth::guard('patient')->login($patient);
                $request->session()->regenerate();
                return $this->handlePatientRedirect($patient->patient_patienttype);
            }

            // Send OTP
            $otp = rand(100000, 999999);
            $patient->patient_otpcode = $otp;
            $patient->patient_otpexpiresat = Carbon::now()->addMinutes(5);
            $patient->save();

            Mail::raw("Your patient OTP is: $otp", function ($message) use ($patient) {
                $message->to($patient->patient_email)
                        ->subject('Your OTP Code');
            });

            session(['otp:type' => 'patient', 'otp:user:id' => $patient->patient_id]);
            Auth::logout();
            return redirect()->route('otp.form');
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

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
        ]);
        

        $userType = session('otp:type');
        $userId = session('otp:user:id');

        if (!$userType || !$userId) {
            return redirect()->route('login')->withErrors(['otp' => 'Session expired. Please login again.']);
        }

        if ($userType === 'admin') {
            $admin = StaffUser::where('user_id', $userId)->first();

          

        if (!$admin) {
            return back()->withErrors(['otp' => 'Admin not found.']);
        }

        if ((string) $admin->user_otpcode !== (string) $request->otp) {
            return back()->withErrors(['otp' => 'OTP does not match.']);
        }


        if (Carbon::now()->gt(Carbon::parse($admin->user_otpexpiresat))) {
            return back()->withErrors(['otp' => 'OTP has expired.']);
        }


            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            session()->forget(['otp:type', 'otp:user:id']);

            if ($request->has('remember_device')) {
                cookie()->queue(
                    'trusted_device_admin_' . $admin->user_id,
                    true,
                    60 * 24 * 30
                );
            }

            $admin->user_otpcode = null;
            $admin->user_otpexpiresat = null;
            $admin->save();

            return $this->handleUserRedirect($admin->user_role);
        }

        if ($userType === 'patient') {
            $patient = PatientUsers::where('patient_id', $userId)->first();

            if (
                !$patient ||
                $patient->patient_otpcode !== $request->otp ||
                Carbon::now()->gt(Carbon::parse($patient->patient_otpexpiresat))
            ) {
                return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
            }

            Auth::guard('patient')->login($patient);
            $request->session()->regenerate();
            session()->forget(['otp:type', 'otp:user:id']);

            if ($request->has('remember_device')) {
                cookie()->queue(
                    'trusted_device_patient_' . $patient->patient_id,
                    true,
                    60 * 24 * 30
                );
            }

            return $this->handlePatientRedirect($patient->patient_patienttype);
        }

        return redirect()->route('login')->withErrors(['otp' => 'Something went wrong.']);
    }




}



