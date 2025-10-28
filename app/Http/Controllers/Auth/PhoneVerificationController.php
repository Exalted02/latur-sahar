<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class PhoneVerificationController extends Controller
{
    public function show(User $user)
    {
        if ($user->phone_verified_at) {
            return redirect(RouteServiceProvider::HOME);
        }
		
		
		$otp = rand(100000, 999999);
		DB::table('user_otps')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'otp' => $otp,
                'expires_at' => now()->addMinutes(5),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        return view('auth.verify-phone', compact('user', 'otp'));
    }

    public function verify(Request $request, User $user)
    {
        $request->validate(['otp' => 'required|digits:6']);

        $record = DB::table('user_otps')->where('user_id', $user->id)->latest()->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'No OTP found.']);
        }

        if (now()->greaterThan($record->expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired.']);
        }

        if ($record->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Mark phone verified
        $user->update(['status'=>1,'phone_verified_at' => now()]);

        // Delete OTP
        DB::table('user_otps')->where('user_id', $user->id)->delete();

        // Log user in
		// dd($user);
		
		// not login now
        Auth::login($user);
		$request->session()->regenerate();

        //return redirect(RouteServiceProvider::HOME)->with('success', 'Phone verified successfully!');
		return redirect(RouteServiceProvider::REGISTRATION)->with('page', 'registration');
    }

    public function resend(User $user)
    {
        $otp = rand(100000, 999999);

        DB::table('user_otps')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'otp' => $otp,
                'expires_at' => now()->addMinutes(5),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // SmsService::send($user->phone, "Your new verification code is $otp");

        return back()->with('status', 'A new OTP has been sent!');
    }
}
