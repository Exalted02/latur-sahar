<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
		
		$user = Auth::user();
		
		

		// Check if phone is verified
		if (is_null($user->phone_verified_at)) {
			Auth::logout();

			// Save user ID to session for later reference
			$request->session()->put('unverified_user_id', $user->id);

			// Redirect to OTP verification page
			return redirect()->route('verification.phone', ['user' => $user->id])
							 ->with('warning', 'Please verify your phone number before continuing.');
		}
		
		// check the status is active 
		if ($user->status == 0) {
			Auth::logout();
			throw ValidationException::withMessages([
				'activestatus' => 'Your account is not activated. Please contact the administrator.',
			]);
		}
		
		
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
		// dd(16);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
	public function loginWithToken(Request $request)
    {
        // Retrieve the token from the query parameters
        $token = $request->query('token');

        try {
            // Decrypt the token to get the user ID
            $userId = Crypt::decryptString($token);

            // Find the user by their ID
            $user = User::find($userId);

            if ($user) {
                // Log the user in on Site 2
                Auth::login($user);

                // Redirect to the dashboard or any desired page
                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
            // Handle invalid token
            return redirect('/login')->withErrors('Invalid login token.');
        }
    }
}
