<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class Verify
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
        if (Auth::user()) {
            if (Auth::user()->status == 'pending') {
               Auth::logout();
             return redirect('login')->with('warning','Cek E-mail anda untuk Verifikasi Akun');
            }
        }
        return $next($request);
    }
}
