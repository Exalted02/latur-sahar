<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
		//echo 'hello';die;
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
		set_email_configuration();
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
	public function store_phone(Request $request)
	{
		$request->validate([
            'mobile' => ['required', 'numeric'],
        ]);
		
		$user = User::where('mobile', $request->mobile)->first();

		if(!$user) {
			return back()->withErrors(['mobile' => 'Mobile number not found.']);
		}
		
		// Generate OTP
		$otp = rand(100000, 999999);

		// Save OTP with expiry
		DB::table('user_otps')->updateOrInsert(
			['user_id' => $user->id],
			[
				'otp' => $otp,
				'expires_at' => now()->addMinutes(5), // expires in 5 mins
				'updated_at' => now(),
				'created_at' => now(),
			]
		);
		
		resolve(SmsService::class)->sendTemplate($user->mobile, 'otp', [
			'otp' => $otp
		]);
		
		return view('auth.verify-password-phone', compact('user', 'otp'));
	}
	
	public function verify_otp(Request $request, User $user)
    {
		
        //$request->validate(['otp' => 'required|digits:6']);
        $record = DB::table('user_otps')->where('user_id', $user->id)->latest()->first();
		//echo "<pre>";print_r($record);die;
        
        if (now()->greaterThan($record->expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired.']);
        }

        if ($record->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }
		
		DB::table('user_otps')->where('user_id', $user->id)->delete();
		
		$token = Password::broker()->createToken($user);
		 
		return redirect()->route('password.reset', ['token' => $token])
                     ->with(['email' => $user->email]);
    }
}
