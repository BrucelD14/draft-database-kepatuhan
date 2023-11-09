<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotReader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->jabatan === 'Senior Manajer MRH' || auth()->user()->jabatan === 'Manajer KTKP' || auth()->user()->jabatan === 'Staff KTKP') {
            return $next($request);
        } else {
            return abort(403);
        }
    }
}
