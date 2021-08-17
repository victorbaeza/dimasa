<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use View;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectAdmin = RouteServiceProvider::ADMIN_HOME;

    protected $redirectClient = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
        $this->middleware('guest:client')->except('logout');
    }

    public function showUserLoginForm()
    {
        // Metemos en la sesión de usuario la URL a la que quería acceder
        if (!session()->has('from')) {
            session()->put('from', url()->previous());
        }

        return View::make('admin._login.login');
    }

    // Realizamos el login una vez recogemos los datos del formulario
    public function do_UserLogin(Request $request)
    {
        $remember = $request->has('remember');
        if(Auth::guard('user')->viaRemember() || Auth::guard('user')->attempt(['user' => $request->input('user'), 'password' => $request->input('password'), 'active' => 1], $remember)){
            return Redirect::intended($this->redirectAdmin);
        }

        return back()->withInput($request->except('password'))->with('error', 'Usuario o contraseña incorrecta');
    }

    public function showClientLoginForm(){
        // Metemos en la sesión de usuario la URL a la que quería acceder
        if (!session()->has('from')) {
            session()->put('from', url()->previous());
        }

        return View::make('auth.login');
    }

    public function do_ClientLoginForm(Request $request){
        $remember = $request->has('remember');
        if(Auth::guard('client')->viaRemember() || Auth::guard('client')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1], $remember)){
            return Redirect::intended($this->redirectClient);
        }

        return back()->withInput($request->except('password'))->with('error', trans('Usuario o contraseña incorrecta'));
    }

    // Cierre de sesión - Logout
    public function logout()
    {
        $this->guard()->logout();

        return redirect('/');
    }

    /**
     * public function logout(Request $request){
     * $cart = collect($request->session()->get('cart'));
     *
     * $this->guard()->logout();
     *
     * $request->session()->invalidate();
     *
     * $request->session()->regenerateToken();
     *
     * if (!config('cart.destroy_on_logout')) {
     * $cart->each(function($rows, $identifier) use ($request) {
     * $request->session()->put('cart.' . $identifier, $rows);
     * });
     * }
     *
     * if ($response = $this->loggedOut($request)) {
     * return $response;
     * }
     *
     * return redirect('/');
     * }
     **/
}
