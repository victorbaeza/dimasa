<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Session;

class LocaleController extends Controller
{
    public function setLocale(Request $request, $locale){

        $previousUrl = redirect()->back()->getTargetUrl();
        $path = parse_url($previousUrl)['path'];
        if(strpos($path,'intranet')){
            self::setLocaleInSession($locale);
            return redirect($previousUrl);
        }

        $segments = explode('/',$path);
        $oldLocale = $segments[1];

        if($request->query->has('slug'))
            return redirect(self::changeSlug($oldLocale, $locale, $previousUrl, $request->query->get('slug'), end($segments)));


        $routeKey = null;

        //para rutas estaticas localizadas
        if(count($segments) > 2){
            $routeLocalized = $segments[2];
            app()->setLocale(Session::get('locale'));
            foreach(Lang::get('routes') as $key => $value){
                if($value == $routeLocalized){
                    $routeKey = $key;
                    break;
                }
            }
        }

       self::setLocaleInSession($locale);

        $uri = str_replace('/'.$oldLocale,'/'.$locale, $previousUrl);
        if($routeKey){
            $newRouteLocalized = trans('routes.' . $routeKey);
            $uri = str_replace('/'.$routeLocalized, '/'.$newRouteLocalized, $uri);
        }

        return redirect($uri);
    }

    private static function changeSlug($oldLocale, $locale, $previousUrl, $slug, $oldSlug){
        self::setLocaleInSession($locale);
        app()->setLocale($locale);
        $uri = str_replace('/'.$oldLocale, '/'.$locale, $previousUrl);
        $uri = str_replace('/'.$oldSlug, '/'.$slug, $uri);
        return $uri;
    }

    private static function setLocaleInSession($locale){
        Session::put('locale', $locale);
        app()->setLocale($locale);
    }
}
