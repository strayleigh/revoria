<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequirePhoneNumber
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            // Bypass phone number check for Admin and Pembina
            if ($user->name === 'admin' || $user->role === 'admin' || $user->role === 'pembina') {
                return $next($request);
            }
            
            // Check if user has an associated anggota record and if no_hp is empty
            $noHp = $user->anggota?->no_hp;

            if (empty($noHp)) {
                // Prevent redirection loop: allow route if it's the prompt route, the submit route, or logout
                if (!$request->routeIs('phone_number.prompt') && !$request->routeIs('phone_number.update') && !$request->routeIs('logout')) {
                    return redirect()->route('phone_number.prompt');
                }
            }
        }

        return $next($request);
    }
}
