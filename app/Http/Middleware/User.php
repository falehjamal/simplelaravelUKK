<?php

namespace App\Http\Middleware;

use Closure;

// use Illuminate\Support\Facades\Auth;
use session;
use Auth;
class User
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
            if (Auth::user()->level == 2) {
                # code...
            return redirect('/buku');
            }
        }
        return $next($request);
    }
}
