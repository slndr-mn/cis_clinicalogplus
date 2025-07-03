<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\StaffUser;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        $record = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$record) {
            return redirect()->route('login')->withErrors(['token' => 'Invalid or expired token.']);
        }

        return view('auth.reset-password', [
            'token' => $token,
            'email' => $record->email,
        ]);
    }

    public function reset(Request $request)
    { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $inputEmail = strtolower($request->email);
        $emailHash = hash('sha256', $inputEmail);

        // Lookup user by hashed email
        $user = StaffUser::where('email_hash', $emailHash)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid user.']);
        }

        // $user->user_email is already decrypted by accessor
        $decryptedEmail = $user->user_email;

        // Validate token and email match
        $record = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->where('email', $decryptedEmail)
            ->first();

        if (!$record) {
            return back()->withErrors(['token' => 'Invalid or expired token.']);
        }

        // Update password
        $user->user_password = Hash::make($request->password);
        $user->save();

        // Remove the reset token
        DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->delete();

        return view('auth.password-reset-success');    }
}
