<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenulisMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Bukan penulis
        if (auth()->user()->role !== 'penulis') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk Penulis.');
        }

        return $next($request);
    }
}
