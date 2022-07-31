<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ( !empty($user->email) && empty($user->mobile) && !empty($user->email_verified_at) ){
            return redirect()->route("user.salesProcess.profileCompletion");
        }

        if ( empty($user->first_name) || empty($user->last_name) || empty($user->national_code) ){
            return redirect()->route("user.salesProcess.profileCompletion");
        }

        if ( !empty($user->mobile) && empty($user->email) && !empty($user->mobile_verified_at) ){
            return redirect()->route("user.salesProcess.profileCompletion");
        }

        return $next($request);
    }
}
