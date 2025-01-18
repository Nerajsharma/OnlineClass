<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->status == 'block') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is blocked. Please contact support.');
        }

        if ($user && $user->status == 'pending') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is pending approval.');
        }

        return $next($request);
    }
}
