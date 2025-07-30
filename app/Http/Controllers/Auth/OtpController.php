<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffUser;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $email = session('otp_email'); // Correct way to get the email
        $otp = $request->input('otp');

        $user = StaffUser::where('user_email', $email)
            ->where('user_otpcode', $otp)
            ->where('user_otpexpiresat', '>=', now())
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid or expired OTP.');
        }

        // Clear the OTP after successful match
        $user->update([
            'user_otpcode' => null,
            'user_otpexpiresat' => null,
        ]);

        auth('staffusers')->login($user);

        return redirect()->route('dashboard')->with('success', 'OTP verified successfully!');
    }
}
