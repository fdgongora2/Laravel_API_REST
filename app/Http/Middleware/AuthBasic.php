<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\SUpport\Facades\Auth;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::onceBasic()) {
            // No está autentificado
            return response()->json(['message' => 'Auth failed'], 401);
        } else {
            return $next($request);
        }
    }
}
