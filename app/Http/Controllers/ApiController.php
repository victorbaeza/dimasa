<?php
namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;

// Clases laravel
use Auth;
use Redirect;
use Hash;
use Validator;
use Illuminate\Http\Request;
use Session;
use Log;
use DB;

// Clases propias
use Helper;
use Order;
use Client;
use OrderLine;
use OrderStatus;
use Product;


class ApiController extends Controller {

	// Aqui definimos el middleware que va a tener el controlador, es decir, los permisos que ha de tener el usuario o lo echaremos fuera
	public function __construct()
	{
  		// Todas las llamadas aqui van a necesitar que el usuario sea admin
  		$this->middleware('user_api');
	}


  public function getPendingOrders(Request $request)
  {
			Log::channel('api')->info('Petición desde IP: '.$request->ip());

      $output = array();
      $output['ok']=0;
      $output['error']='';

			$check = $this->checkCredentials($request);
			if (!$check)
			{
					$output['error'] = 'Ha ocurrido un error';
					return json_encode($output);
			}

      $orders = Order::whereIn('status', OrderStatus::NOT_DELETEABLE_STATUS)->get();
			$order_lines = array();

			foreach ($orders as $order)
			{
					$order_lines[$order->id] = OrderLine::where('order_id', $order->id)->get();
			}

      if ($orders)
      {
          $output['ok'] = 1;
          $output['orders'] = $orders;
					$output['order_lines'] = $order_lines;

          return json_encode($output);
      }

  }


	private function checkCredentials(Request $request)
	{

			if (!$request->user || !$request->password)
			{
					Log::channel('api')->info('Intento fallido');
					Log::channel('api')->info($request->all());

					return false;
			}

			if (strcmp($request->user, config('app.api_user'))!==0)
			{
					Log::channel('api')->info('Intento de usuario incorrecto: '.$request->user);

					return false;
			}

			$password = config('app.api_key');
			if (!Hash::check($password, $request->password))
			{
						Log::channel('api')->info('Contraseña incorrecta: '.$request->password);

						return false;
			}

			return true;

	}

}
