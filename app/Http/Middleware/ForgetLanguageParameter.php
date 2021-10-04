<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
use Request;
use Session;

class ForgetLanguageParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        URL::defaults(['language' => app()->getLocale()]);
        $request->route()->forgetParameter('language');

        return $next($request);
    }
}
