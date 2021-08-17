<?php

namespace App\Http\Middleware;

use Closure;
use UserRole;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user()->role != UserRole::textToRoleValue($role)){
            return redirect('/');
        }

        return $next($request);
    }
}
