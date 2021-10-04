<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;

use View;
use User;
use Redirect;
use Hash;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:cliente')->except('logout');
    }

    // Mostramos la vista de login
    public function getLoginForm()
    {
      // Metemos en la sesión de usuario la URL a la que quería acceder
      if (!session()->has('from'))
      {
        session()->put('from', url()->previous());
      }

      return view('admin._login.login');
    }


    public function do_login(Request $request)
    {
        $user = User::where('user', $request->input('user'))->where('active', 1)->first();

        if (!$user)
        {
          $error = 'Tu usuario no existe en nuestra base de datos';
          return Redirect::to('/admin')->with('error', $error);
        }

        $password = $request->input('password');
        // Si existe el email y además coincide el hash del password...
        if ($user && Hash::check($password, $user->password))
        {
            // Lo autenticamos en el sistema, el segundo parámetro en true para que lo recuerde hasta que haga logout
            // Auth::login($user,true);
            Auth::guard('admin')->login($user,true);

            return redirect('/admin');
        }
        else
        {
            // La contraseña es incorrecta
            $error = 'Contraseña incorrecta';
            return Redirect::to('/admin')->withInput($request->except('password'))->with('error', $error);
        }

    }

    public function logout()
    {
        // Logout
        Auth::logout();
        return redirect('admin');
    }

}
