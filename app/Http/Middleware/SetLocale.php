<?php

namespace App\Http\Middleware;

use Closure;
use Helper;
use Session;
use Illuminate\Support\Facades\Request;

class SetLocale
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
        $availableLanguages = Helper::getLanguages();
        $requestLang = Request::segment(1);

        if (in_array($requestLang, $availableLanguages))
        {
            if (Session::has('locale'))
            {
                $locale = Session::get('locale');
                if (strcasecmp($locale, $requestLang) !== 0)
                {
                    $this->setLocale($requestLang);
                }
            } else {
                $this->setLocale($requestLang);
            }
        } else {
            // El slash del idioma introducido no existe en la aplicación -> Se establece el idioma por defecto
            $this->setLocale(config('app.locale'));
        }

        // if(Session::has('locale')) {
        //     app()->setLocale(Session::get('locale'));
        // }else{
        //     // $availableLanguages = Helper::getLanguages();
        //     // $userLangs = preg_split('/,|;/', $request->server('HTTP_ACCEPT_LANGUAGE'));
        //     //
        //     // foreach ($availableLanguages as $lang) {
        //     //     if(in_array($lang, $userLangs)){
        //     //         app()->setLocale($lang);
        //     //         Session::put('locale', $lang);
        //     //         break;
        //     //     } else {
        //     //         app()->setLocale(config('app.locale'));
        //     //     }
        //     // }
        //     $availableLanguages = Helper::getLanguages();
        //     $requestLang = Request::segment(1);
        //
        //     if (in_array($requestLang, $availableLanguages)) {
        //         dd($requestLang);
        //     } else {
        //         dd('No está el idioma');
        //     }
        //
        // }

        return $next($request);
    }

    private function setLocale($lang)
    {
        app()->setLocale($lang);
        Session::put('locale', $lang);

        return true;
    }
}
