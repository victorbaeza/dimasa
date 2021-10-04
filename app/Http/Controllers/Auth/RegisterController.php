<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Country;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Where to redirect users after registration.
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
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:user')->except('logout');
        // $this->middleware('guest:client')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Client|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        $client = Client::make([
            'email' => $data['email'],
        ]);
        $client->password = Hash::make($data['password']);
        $client->save();
        return $client;
    }

    public function register(Request $request)
    {
        $client = Auth::guard('client')->check();
        if ($client) return redirect('/');

        return view('site.client_area.register');
    }

    public function do_register(Request $request)
    {
        // $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));
        //
        // auth()->guard('client')->login($user);
        //
        // return $request->wantsJson()
        //     ? new Response('', 201)
        //     : redirect('/');

        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
          return redirect()->back()->with('error', $validator->errors()->all());
        }

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = Hash::make($request->password);
        $client->country_id = Country::ID_SPAIN;
        $client->shipping_country_id = Country::ID_SPAIN;

        if (intval($request->empresa)==1)
        {
            $client->professional = 1;
            $client->professional_pending_validation = 1;
            $client->save();

            $client->sendRegistrationMail();

            return redirect()->back()->with('success', trans('messages.registro_completado_profesional'));
        }

        $client->save();

        $client->sendRegistrationMail();

        auth()->guard('client')->login($client);

        return redirect(route('client.home'))->with('success', trans('messages.registro_completado'));
    }
}
