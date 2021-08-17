<?php

use App\Http\Controllers\SiteController;

$all_langs = Helper::getLanguages();

foreach( $all_langs as $prefix ){

   if ($prefix == 'es') $prefix = '';
   // Route::get('/', [SiteController::class, 'index'])->name($prefix.'_home');

   Route::group(['prefix' => $prefix, 'middleware' => ['setLocale','forgetLanguageParameter']], function() use ($prefix) {

         // Las URLs sin prefijo deben ir al idioma por defecto
         if ($prefix == '') $prefix = config('app.locale');

         Route::get('/', [SiteController::class, 'index'])->name($prefix.'_home');

         // Blogs / noticias

         // Productos / Catálogo

         // Contacto
         Route::get(Lang::get('routes.contact',[], $prefix), [SiteController::class, 'getContact'])->name($prefix.'_contact');

         // Sobre nosotros
         Route::get(Lang::get('routes.about',[], $prefix), [SiteController::class, 'getAboutUs'])->name($prefix.'_aboutUs');

         // Páginas legales


   });
}

// Rutas sin localización
Route::post('/contact/submit', [SiteController::class, 'do_submitContact'])->name('site.do_contact');

// Newsletter
Route::post('/newsletter/subscribe', [SiteController::class, 'do_subscribeNewsletter'])->name('newsletter.do_subscribe');

require base_path('routes/site/cart/routes.php');
require base_path('routes/site/bank_transfer/routes.php');
require base_path('routes/site/ajax/routes.php');

Route::get('/set-language/{locale}', [LocaleController::class, 'setLocale'])->name('set_language');
Route::get('/accept-cookies', 'SiteController@do_acceptCookies')->name('site.accept_cookies');
