<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

use View;
use Redirect;
use Hash;
use Auth;
use Client;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest_client')->except('logout');
    }


    // Mostramos la vista de login
    public function getLoginForm()
    {
      // Metemos en la sesión de usuario la URL a la que quería acceder
      if (!session()->has('from'))
      {
        session()->put('from', url()->previous());
      }

      return view('site.client_area.login');
    }


    public function do_login(Request $request)
    {
        $client = Client::where('email', $request->input('email'))->where('active', 1)->first();

        if (!$client)
        {
          return back()->withInput($request->except('password'))->with('error', 'Tu usuario no existe, por favor inténtalo de nuevo');
        }

        $password = $request->input('password');
        // Si existe el email y además coincide el hash del password...
        if ($client && Hash::check($password, $client->password))
        {
            // Lo autenticamos en el sistema, el segundo parámetro en true para que lo recuerde hasta que haga logout
            Auth::guard('client')->login($client,true);

            return Redirect::intended('/intranet/user-area');
        }
        else
        {
            // La contraseña es incorrecta
            return back()->withInput($request->except('password'))->with('error', 'Usuario o contraseña incorrecta');
        }

    }

    public function logout()
    {
        // Logout
        Auth::guard('client')->logout();
        return redirect('/');
    }

}
