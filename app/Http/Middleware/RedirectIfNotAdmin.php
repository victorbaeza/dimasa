<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use UserType;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/admin')->with('error', 'Debe loguearse primero para acceder.');
        }

        else if (Auth::guard($guard)->user()->type_id !== UserType::ID_ADMIN)
        {
          return response('No tiene permiso para acceder', 401);
        }

        return $next($request);
    }
}
