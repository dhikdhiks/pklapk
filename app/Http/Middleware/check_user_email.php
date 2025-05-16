<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class check_user_email
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->hasRole('Siswa')) {
            // Hanya cek siswa kalau rolenya Siswa
            $exists = \App\Models\Siswa::where('email', $user->email)->exists();

            if (!$exists) {
                Auth::logout();
                return redirect('/login')->with('error', 'Email tidak terdaftar sebagai siswa.');
            }
        }
    }

    return $next($request);
}

}
