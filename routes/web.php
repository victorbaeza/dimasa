<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LocaleController;

Route::get('test', [SiteController::class, 'test']);


// Route::get('/', function(){
//     return redirect(app()->getLocale());
// });

//Rutas con localizacion
require base_path('routes/site/routes.php');
// Route::group(['prefix' => '{language}', 'where' => ['language' => '[a-zA-Z]{2}'], 'middleware' => ['setLocale','forgetLanguageParameter']], function(){
//
//     Route::get('/', [SiteController::class, 'index'])->name('home');
//     Route::get('/login', [ClientLoginController::class, 'getLoginForm'])->name('client.login');
//     Route::post('/login', [ClientLoginController::class, 'do_login'])->name('client.do_login');
//
//     Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
//     Route::post('/password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
//     Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//     Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
//
//     Route::get('/register', [RegisterController::class, 'register'])->name('client.register');
//     Route::post('/register', [RegisterController::class, 'do_register'])->name('client.do_register');
//
//     //Rutas publicas
//     require base_path('routes/site/routes.php');
// });


// Rutas de cliente - AUTENTICADO
Route::middleware(['client', 'setLocale'])->group(function (){
    require base_path('routes/site/client_area/routes.php');
});




// Rutas de autenticado
Route::group(array('middleware' => 'auth'), function(){
  Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

// Rutas de admin
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminLoginController::class, 'getLoginForm'])->name('user.login');
    Route::post('/', [AdminLoginController::class, 'do_login']);

    // Route::get('/forgot', 'Auth\ForgotPasswordController@getForgot');
    // Route::get('/forgot/result', function() { return view('admin._login.forgot2'); });
    // Route::post('/forgot', 'Auth\ForgotPasswordController@do_Forgot');
    // Route::get('/reset/{token}', 'Auth\ResetPasswordController@resetPassword');
    // Route::post('/reset', 'Auth\ResetPasswordController@do_resetPassword');
});

// Rutas de admin - AUTENTICADO
Route::group(array('middleware' => 'admin'), function(){
  require base_path('routes/admin/routes.php');
  require base_path('routes/admin/ajax/routes.php');
});
