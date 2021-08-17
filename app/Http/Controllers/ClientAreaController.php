<?php

namespace App\Http\Controllers;

// Clases laravel
use App\Http\Requests\EditAddressRequest;
use Country;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Hash;

// Clases propias
use Client;
use Order;


class ClientAreaController extends Controller
{

    public function getHomeClient()
    {
        $client = Auth::guard('client')->user();

        return view('site.client_area.home', compact('client'));
    }

    public function do_editData(Request $request)
    {
        /** @var Client $client */
        $client = Auth::guard('client')->user();
        if ($client->id != $request->input('id')) abort(401);

        $request->validate(Client::rules($client->id));
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->dni = $request->input('dni');
        $client->phone = $request->input('phone');
        $client->save();

        $pwd = $request->input('pwd');
        $pwd2 = $request->input('pwd2');

        if (!empty($pwd) && !empty($pwd2)) {  //si no introduce contraseña es que no la quiere cambiar
            if ($pwd === $pwd2)
            {// Si introduce contraseña nueva y Si coinciden las contraseñas
                $client->password = Hash::make($pwd);
                $client->save();
            } else {
                return redirect()->back()->with('error',trans('messages.contrasena_no_coincide'));
            }
        }

        return redirect()->back()->with('success', trans('messages.datos_modificados_correctamente'));
    }

    public function getAddress()
    {
        $client = Auth::guard('client')->user();
        // $countries = Country::all();

        return view('site.client_area.address', compact('client'));
    }

    public function do_editAddress(EditAddressRequest $request)
    {
        /** @var Client $client */
        $client = Auth::guard('client')->user();
        if ($client->id != $request->input('id')) abort(401);

        $sameAddress = $request->has('same_address');

        $client->shipping_address = $request->input('shipping_address');;
        $client->shipping_city = $request->input('shipping_city');
        $client->shipping_postal_code = $request->input('shipping_postal_code');
        $client->shipping_province = $request->input('shipping_province');
        // $client->shipping_country_id = $request->input('shipping_country_id');

        if($sameAddress){
            $client->address = $request->input('shipping_address');
            $client->city = $request->input('shipping_city');
            $client->postal_code = $request->input('shipping_postal_code');
            $client->province = $request->input('shipping_province');
            // $client->country_id = $request->input('shipping_country_id');
        }else{
            $client->address = $request->input('address');
            $client->city = $request->input('city');
            $client->postal_code = $request->input('postal_code');
            $client->province = $request->input('province');
            // $client->country_id = $request->input('country_id');
        }

        $client->save();

        return redirect()->back()->with('success', trans('messages.direcciones_modificadas_correctamente'));
    }

    public function listOrders()
    {
        /** @var Client $client */
        $client = Auth::guard('client')->user();

        $orders = Order::where('client_id', $client->id)->with('lines')->get();

        return view('site.client_area.orders', compact('orders'));
    }


}
