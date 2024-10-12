<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }

    protected function redirectTo(Request $request): ?string
    {
        // Periksa apakah pengguna tidak terautentikasi
        if (!$request->expectsJson()) {
            return route('pelamar.login'); // Ganti dengan route pelamar.login
        }
        
        return null;
    }

}
