<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsReviewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!auth()->check() || auth()->user()->jabatan != 'Senior Manajer MRH') {
        //     abort(403);
        // }
        if (!auth()->check() || auth()->user()->nip != 'approval_JDIH_INKA') {
            abort(403);
        }

        return $next($request);
    }
}
