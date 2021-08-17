<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use Session;
use Config;
use Str;
use Cookie;
use TrackingSession as TrackingSession;
use TrackingVisit as TrackingVisit;

class TrackingSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $cookie = Cookie::get('shop_session');

        if (!$request->hasCookie('shop_session'))
        {
          $unique_token = Str::uuid();

          $nueva_cookie = cookie()->forever('shop_session', $unique_token);

          $visit = TrackingVisit::newVisitor($unique_token);
          $session = TrackingSession::newSession($visit, $request);

          Session::put('uuid', $session->id);

          return $response->withCookie($nueva_cookie);

        } else {

          if (!Session::has('uuid'))
          {
              $visit = TrackingVisit::where('uuid', $cookie)->first();

              if ($visit)
              {
                $session = TrackingSession::newSession($visit, $request);

                Session::put('uuid', $session->id);
              } else {
                $visit = TrackingVisit::newVisitor($cookie);
                $session = TrackingSession::newSession($visit, $request);

                Session::put('uuid', $session->id);
              }
          }

          return $response;
        }

    }
}
