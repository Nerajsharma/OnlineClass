<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle post-login status check.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status == 'block') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is blocked. Please contact to the Admin.');
        }

        if ($user->status == 'pending') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is pending approval.');
        }

        // Allow login for active users
        return redirect()->intended('/dashboard'); // or your desired route
    }
}

