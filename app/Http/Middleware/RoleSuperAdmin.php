<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RoleSuperAdmin
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
        if (Auth::guard('pengguna')->User()->role != "Super Admin") {
            abort(401);
        }

        return $next($request);
    }
}
