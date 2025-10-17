<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsurePhoneIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && is_null($user->phone_verified_at)) {
            return redirect()->route('verification.phone', ['user' => $user->id]);
        }

        return $next($request);
    }
}
