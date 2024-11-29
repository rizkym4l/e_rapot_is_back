<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === $role) {
                return $next($request);
            } else {
                Log::warning('User does not have the required role.');
                return redirect('/error'); // Redirect ke halaman error jika peran tidak cocok
            }
        } else {
            Log::warning('User is not authenticated.');
            return redirect('/login'); // Redirect ke halaman login jika belum diautentikasi
        }
    }
}
