<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Helper;
use Redirect;
use UserRole;
use View;

// Clases propias
use Country;
use Client;
use User;

class ClientController extends Controller
{
    public function list(Request $request)
    {
        $clients = Client::query();

        $q = $request->input('q');
        if (!empty($q)) {
            $clients = $clients->where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $clients = Helper::do_orderColumn($clients, $order_col, $order, 'id', 'ASC');

        $clients = $clients->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.clients.list', compact('clients', 'q', 'order_col', 'order'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function do_create(Request $request)
    {
        $pwd = $request->input('password');
        $pwd2 = $request->input('repeatPassword');

        if ($pwd !== $pwd2)
        {
            return redirect()->back()->withInput($request->all())->with('error', 'Las contraseñas introducidas no coinciden!');
        }

        // $this->validateData($request);

        $client = new Client;
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->active = 1;
        $client->professional = intval($request->input('professional'));
        $client->password = Hash::make($pwd);

        $client->dni = $request->input('dni');
        $client->address = $request->input('address');
        $client->city = $request->input('city');
        $client->postal_code = $request->input('postal_code');
        $client->province = $request->input('province');
        $client->country_id = Country::ID_SPAIN;
        // Direcciones de envio
        $client->shipping_address = $request->input('shipping_address');
        $client->shipping_city = $request->input('shipping_city');
        $client->shipping_postal_code = $request->input('shipping_postal_code');
        $client->shipping_province = $request->input('shipping_province');
        $client->shipping_country_id = Country::ID_SPAIN;
        $client->save();


        return redirect()->action('Admin\ClientController@list')->with('success', 'El cliente ha sido creado correctamente');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function do_edit(Request $request)
    {
        $client = Client::findOrFail($request->input('id'));
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->professional = intval($request->input('professional'));

        $client->dni = $request->input('dni');
        $client->address = $request->input('address');
        $client->city = $request->input('city');
        $client->postal_code = $request->input('postal_code');
        $client->province = $request->input('province');
        $client->country_id = Country::ID_SPAIN;
        // Direcciones de envio
        $client->shipping_address = $request->input('shipping_address');
        $client->shipping_city = $request->input('shipping_city');
        $client->shipping_postal_code = $request->input('shipping_postal_code');
        $client->shipping_province = $request->input('shipping_province');
        $client->shipping_country_id = Country::ID_SPAIN;
        $client->save();

        if ($client->professional) $client->assignCommercial($request->input('commercial_id'));

        $pwd = $request->input('password');
        $pwd2 = $request->input('repeatPassword');

        if($pwd && $pwd2)
        { // Si introduce contraseña nueva
          if($pwd==$pwd2)
          { // Si coinciden las contraseñas
            $client->password = Hash::make($pwd);
            $client->save();
          } else {
            return redirect()->back()->withInput($request->all())->with('error', 'Las contraseñas introducidas no coinciden!');
          }
        }

        return redirect()->action('Admin\ClientController@list')->with('success', 'El cliente ha sido modificado correctamente!');
    }

    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->active = 1;
        $client->save();
        return redirect()->back()->with('success', 'El cliente ha sido activado con éxito!');
    }

    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->active = 0;
        $client->save();
        
        return redirect()->back()->with('success', 'El cliente ha sido desactivado con éxito!');
    }

    public function validateProfessionalClient($id)
    {
        $client = Client::findOrFail($id);
        $client->professional_pending_validation = 0;
        $client->active = 1;
        $client->save();

        return redirect()->back()->with('success', 'El cliente profesional ha sido validado, a partir de ahora ya podrá acceder al área de clientes!');
    }

    private function validateData(Request $request,int $id = 0) : void{
         $request->validate(Client::rules($id),Client::$rulesMessages);
    }
}
