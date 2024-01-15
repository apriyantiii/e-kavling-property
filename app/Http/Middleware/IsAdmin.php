<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'admin') {
            return $next($request);
        } elseif (auth()->user()->role == 'director') {
            // Tambahkan logika khusus untuk peran 'director' di sini
            return $next($request);
        } else {
            return redirect('home')->with('error', 'kamu ga punya akses!');
        }
    }
}
