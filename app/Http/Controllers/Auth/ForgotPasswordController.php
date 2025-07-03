<?php
// app/Http/Controllers/Auth/ForgotPasswordController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use App\Models\StaffUser;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $inputEmail = strtolower($request->email);
        $emailHash = hash('sha256', $inputEmail);

        // Find the user by the hashed email
        $user = StaffUser ::where('email_hash', $emailHash)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'This email is not registered.']);
        }

        // Decrypt the user's email
        // This is enough, it's already decrypted by the accessor
        $decryptedEmail = $user->user_email;


        $token = Str::random(60); 

        // Store the email in plain text in the password_reset_tokens table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $decryptedEmail], // Store decrypted email
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        try {
        Mail::send('auth.verify', ['token' => $token], function ($message) use ($decryptedEmail) {
                $message->to($decryptedEmail)->subject('Reset Password Notification');
            });

            return back()->with('success', 'Reset password link sent successfully!');
        } catch (\Exception $e) {
            Log::error('Reset Link Email Error: '.$e->getMessage());
            return back()->with('error', 'Something went wrong while sending the reset link.');
        }
    }

}
