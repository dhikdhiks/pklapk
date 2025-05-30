<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class check_user_email
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Jika user adalah Siswa
            if ($user->hasRole('Siswa')) {
                $exists = \App\Models\Siswa::where('email', $user->email)->exists();

                if (!$exists) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Email tidak terdaftar sebagai Siswa.');
                }
            }

            // Jika user adalah Guru
            if ($user->hasRole('Guru')) {
                $exists = \App\Models\Guru::where('email', $user->email)->exists();

                if (!$exists) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Email tidak terdaftar sebagai Guru.');
                }
            }

            // Jika user super_admin, tidak perlu cek
        }

        return $next($request);
    }
}
