<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KycMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // guest users go to login
        }

        if (Auth::user()->kyc_verified != 1) {
            return redirect('/kyc')->with('message', 'Your KYC Under Review'); // unverified users go to KYC page
        }

        return $next($request);
    }
}
