<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\OrderRequest;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;
use Redirect;
use Cart;
use Session;
use Ssheduardo\Redsys\Facades\Redsys;
use Str;
use Log;

// Clases propias
use Helper;
use Client;
use Country;
use Coupon;
use DiscountType;
use CouponOrder;
use ShippingMethod;
use Order;
use OrderLine;
use OrderStatus;
use Product;
use RecordNumeration;
use PaymentForm;
use PostalCodeBlacklist;

class OrderController extends Controller
{

    public function getCart(Request $request)
    {
        $cartContent = Cart::content();

        return view('site.order.cart');
    }

    public function orderDetails(Request $request){
        $cartContent = Cart::content();
        if ($cartContent->count()<1) return redirect()->back()->with('error', 'Debe añadir al menos un producto al carrito!');

        $countries = Country::all();
        $shipments = ShippingMethod::whereActive(1)->get();

        if(auth()->guard('client')->check()){
            /** @var Client $client */
            $client = auth()->guard('client')->user();
            return view('site.order.cart-details', compact('client','countries','shipments'));
        }

        return view('site.order.cart-details', compact('countries','shipments'));
    }

    public function applyCoupon(Request $request){
        $code = Coupon::whereCode($request->input('code'))->first();

        if(!$code || $code->start_date > Carbon::now())
              return redirect()->back()->with('error', 'No existe el código');

        if($code->end_date < Carbon::now() || ($code->use_limit != null && $code->use_limit <= 0))
            return redirect()->back()->with('error', 'El código introducido ha caducado');

        if($code->minimum_price != null && $code->minimum_price > Helper::getCartTotal())
            return redirect()->back()->with('error', 'Precio mínimo para el cupon: '.$code->minimum_price.Helper::getCurrentCurrency());

        if(Session::has('codes')){
            $codes = Session::get('codes');
            if(in_array($code, $codes)){
                return redirect()->back()->with('error', 'El cupón ya ha sido aplicado');
            }else{
                array_push($codes, $code);
                Session::put('codes', $codes);
            }
        }else{
            Session::put('codes', array($code));
        }

        return redirect()->back()->with('success', 'El cupón ha sido aplicado a tu pedido!');
    }


    public function checkOrder(OrderRequest $request){
        $order = new Order;

        self::assignAddress($order, $request);
        self::assignShipment($order, $request->input('shipment'));

        $subtotal = Helper::getCartSubtotal();
        $total = Helper::getCartTotal();
        $order->number = $order->generateNumber();
        $order->redsys_number = time();
        $order->uuid = Str::uuid()->toString();

        $discount = 0;
        if(Session::has('codes')){
            $validCoupons = array();
            foreach (Session::get('codes') as $coupon){
                if(!$coupon->getIsValid()){
                    continue;
                }
                $discount += $coupon->getDiscountValue($total);
                $total = $coupon->getDiscount($total);
                if($coupon->use_limit != null){
                    $coupon->use_limit--;
                    $coupon->save();
                }
                array_push($validCoupons,$coupon);
            }
            Session::put('codes',$validCoupons);
        }
        $total += $order->shipping_cost;

        $order->discount = $discount;
        $order->subtotal = $subtotal;
        $order->total = $total;
        $order->VAT = Helper::getTaxTotal();
        $order->status_id = OrderStatus::PENDING;
        $order->save();

        self::createOrderLines($order);

        if(Session::has('codes')){
            foreach (Session::get('codes') as $coupon){
                $couponOrder = new CouponOrder();
                $couponOrder->order_id = $order->id;
                $couponOrder->coupon_id = $coupon->id;
                $couponOrder->save();
            }
        }

        return redirect()->route('order.payment', ['uuid' => $order->uuid]);
    }

    private static function assignAddress(Order $order, Request $request){
        $sameAddress = $request->has('same_address');

        $order->name = $request->input('name');
        $order->date = date('Y-m-d H:i:s');
        $order->email = $request->input('email');
        $order->cif = $request->input('cif');
        $order->phone = $request->input('phone');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_postal_code = $request->input('shipping_postal_code');
        $order->shipping_province = $request->input('shipping_province');
        // $order->shipping_country_id = $request->input('shipping_country_id');
        $order->shipping_country_id = Country::ID_SPAIN;

        if($sameAddress){
            $order->address = $request->input('shipping_address');
            $order->city = $request->input('shipping_city');
            $order->postal_code = $request->input('shipping_postal_code');
            $order->province = $request->input('shipping_province');
            // $order->country_id = $request->input('shipping_country_id');
            $order->country_id = Country::ID_SPAIN;
        }else{
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->postal_code = $request->input('postal_code');
            $order->province = $request->input('province');
            // $order->country_id = $request->input('country_id');
            $order->country_id = Country::ID_SPAIN;
        }
    }

    private static function assignShipment(Order $order, $shipmentMethodId){
        $shipment = ShippingMethod::find($shipmentMethodId);

        if(empty($shipment))
            $shipment = ShippingMethod::whereDefault(1)->get();

        $order->shipping_method_id = $shipment->id;
        $order->shipping_cost = $shipment->minimum_free != null && Helper::getCartTotal() > $shipment->minimum_free ? 0 : $shipment->cost;
    }

    private static function createOrderLines(Order $order){
        foreach (Cart::content() as $cartItem){
            $line = new OrderLine();
            $line->product_id = $cartItem->model->id;
            $line->quantity = $cartItem->qty;
            $line->price_unit = $cartItem->price;
            $line->product_name = $cartItem->name;
            $line->VAT = $cartItem->model->VAT;
            $order->Lines()->save($line);
        }
    }

    public function paymentForm(Request $request, string $uuid){
        $order = Order::with('lines')->where('uuid',$uuid)->firstOrFail();

        if($order->status_id != OrderStatus::PENDING)
            return redirect()->route('home');

        return view('site.order.payment-form', compact('order'));
    }

    private function checkBlacklist(Order $order)
    {
        $is_in_blacklist = PostalCodeBlacklist::where('postal_code', $order->shipping_postal_code)->first();
        if ($is_in_blacklist)
        {
            return true;
        } else {
            return false;
        }
    }

    public function do_paymentPaypal(Request $request){
        $order = Order::where('uuid', $request->input('orderUuid'))->firstOrFail();

        $order->status_id = OrderStatus::PAID;
        $order->payment_form_id = PaymentForm::PAYPAL;
        $order->paid_at = date('Y-m-d H:i:s');
        $order->save();

        Session::forget('codes');
        Cart::destroy();

        // Envío de emails de confirmación
        $order->sendClientMailConfirmation();
        sleep(2);
        $order->sendAdminMailConfirmation();

        return view('site.order.order-completed', compact('order'));
        // return redirect()->route('order.completed', app()->getLocale());
    }

    public function do_paymentRedsys(Request $request){
      $order = Order::findOrFail($request->input('id'));
      if ($order->status_id == OrderStatus::PAID && $order->status_id == OrderStatus::DELIVERED) return Redirect::back()->with('error', 'Ha ocurrido un error, por favor inténtelo de nuevo');

      try{
          $key = config('redsys.key');

          Redsys::setAmount($order->total);
          Redsys::setOrder($order->redsys_number);
          Redsys::setMerchantcode(config('redsys.merchantcode')); //Reemplazar por el código que proporciona el banco
          Redsys::setCurrency('978');
          Redsys::setTransactiontype('0');
          Redsys::setTerminal('1');
          Redsys::setMethod('T'); //Solo pago con tarjeta, no mostramos iupay
          Redsys::setNotification(App::make('url')->to(config('redsys.url_notification'))); //Url de notificacion
          Redsys::setUrlOk(App::make('url')->to(config('redsys.url_ok').'?o='.$order->uuid)); //Url OK
          Redsys::setUrlKo(App::make('url')->to(config('redsys.url_ok').'?o='.$order->uuid)); //Url KO
          Redsys::setVersion('HMAC_SHA256_V1');
          Redsys::setTradeName(config('redsys.tradename'));
          Redsys::setTitular($order->name);
          Redsys::setProductDescription('Compra de articulos');
          Redsys::setEnviroment(config('redsys.enviroment'));

          $signature = Redsys::generateMerchantSignature($key);
          Redsys::setMerchantSignature($signature);
          Redsys::setAttributesSubmit('btn-submit', 'btn_id', 'Enviar', 'display:none');
          // $form = Redsys::createForm();
      }
      catch(Exception $e){
          Log::channel('orders')->info('Error en do_paymentRedsys: '.$e->getMessage());
          echo $e->getMessage();
      }
      return Redsys::executeRedirection();
    }



    public function do_confirmationPaymentRedsys(Request $request){
      try{
        $key = config('redsys.key');
        $parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
        $DsResponse = $parameters["Ds_Response"];
        $DsPedido = $parameters["Ds_Order"];
        $DsResponse += 0;

        if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {
            // Pago confirmado de Redsys

            $order = Order::where('redsys_number', $DsPedido)->first();
            if($order){
              $order->payment_form_id = PaymentForm::REDSYS;
              $order->status_id = OrderStatus::PAID;
              $order->paid_at = date('Y-m-d H:i:s');
              $order->save();

              // $order->crearFactura();

              Session::forget('codes');
              Cart::destroy(); // Vacía el carrito

              // Envío de emails de confirmación
              $order->sendClientMailConfirmation();
              sleep(2);
              $order->sendAdminMailConfirmation();

            } else {
              Log::channel('orders')->info('NO SE HA ENCONTRADO PEDIDO (redsys_order): '.$DsPedido);
              Log::channel('orders')->info($order->toJson(JSON_PRETTY_PRINT));
            }

        } else {
            //lo que quieras que haga si no es positivo
            $order = Order::where('redsys_number', $DsPedido)->first();
            if($order){
              Log::channel('orders')->info('PEDIDO con id '.$order->id.': Intento de pago fallido con código de respuesta: '.$DsResponse);

              $observaciones = $order->observations."\n";
              $order->observations = $observaciones.'Intento de pago fallido con código de respuesta: '.$DsResponse.' ('.date('Y-m-d H:i:s').')';
              $order->save();
            }
        }
      } catch(SermepaTpvTpvException $e){
        echo $e->getMessage();
      }
    }


    public function do_bankTransferPayment(Request $request)
    {
        $order = Order::where('id', $request->input('id'))->where('uuid', $request->input('order'))->first();

        if (!$order) return Redirect::back()->with('error', 'Ha ocurrido un error al procesar el pago, por favor inténtelo de nuevo');

        $transfer_document = $request->file('justificante_transf_bancaria');
        if (!$transfer_document) return Redirect::back()->with('error', 'Debe adjuntar el justificante para completar el pedido');

        $filename = $order->number . '_' . $transfer_document->getClientOriginalName();
        $transfer_document->storeAs($order::DOCUMENT_PATH, $filename);

        $order->payment_form_id = PaymentForm::BANK_TRANSFER;
        $order->status_id = OrderStatus::PENDING;
        $order->paid_at = date('Y-m-d H:i:s');
        $order->bank_transfer_document = $filename;
        $order->save();

        Session::forget('codes');
        Cart::destroy();

        $order->sendClientMailConfirmation();

        return view('site.order.order-completed', compact('order'));
        // return redirect()->route('order.completed', app()->getLocale());
    }


    public function orderCompleted(Request $request)
    {
        Log::channel('test')->info($request->all());

        $order = Order::where('uuid', $request->input('o'))->first();
        if ($order)
        {
            Log::channel('test')->info($order);

            return view('site.order.order-completed', compact('order'));
        } else {
            Log::channel('test')->info('Error, se devuelve a la vista de order-completed sin el pedido');

            return view('site.order.order-completed');
        }
    }


    public function addCartProduct(Request $request){
       $productId = $request->input('product_id');
       $qty =  intval($request->get('quantity'));

        if($qty <= 0)
            return redirect()->back()->with('error', trans('common.cantidad_incorrecta'));


       $product = Product::findOrFail($productId);
       if (!$product->active)
            return redirect()->back()->with('error', 'Ha ocurrido un error interno, por favor inténtelo de nuevo');

       $cartItem = Cart::add($product->id, $product->name, $qty, $product->getFinalPrice($qty));
       $cartItem->associate(Product::class);

       if ($cartItem->qty>$qty)
       {
          $cartItem->price = $product->getFinalPrice($cartItem->qty);
       }

       return redirect()->back()->with('success', trans('common.producto_anyadido'));
    }

    public function deleteCartProduct(Request $request, string $id){
        Cart::remove($id);

        return response()->json(['subtotal' => number_format(Helper::getCartSubtotal(),2),'total' => number_format(Helper::getCartTotal(),2), 'vat' => number_format(Helper::getTaxTotal(),2)],200);
    }

    public function changeProductQuantity(Request $request, string $id){
        $qty =  intval($request->get('quantity'));
        $addPrevious = $request->has('addPrevious');
        $cartItem = Cart::get($id);

        if($qty <= 0)
            return response()->json(null, 400);

        if($addPrevious)
            $qty += $cartItem->qty;

        Cart::update($id, ['qty' => $qty, 'price' => $cartItem->model->getFinalPrice($qty)]);

        if($request->expectsJson())
            return response()->json(['subtotal' => number_format(Helper::getCartSubtotal(),2),'total' => number_format(Helper::getCartTotal(),2), 'vat' => number_format(Helper::getTaxTotal(),2)],200);

        return redirect()->back()->with('success', trans('common.producto_anyadido'));
    }

    public function addCartDirectCheckout(Request $request)
    {

        $productId = $request->input('product_id');
        $qty =  intval($request->get('quantity'));

         if($qty <= 0)
             return redirect()->back()->with('error', trans('common.cantidad_incorrecta'));


        $product = Product::findOrFail($productId);

        $cartItem = Cart::add($product->id, $product->name, $qty, $product->getFinalPrice($qty));
        $cartItem->associate(Product::class);

        if ($cartItem->qty>$qty)
        {
           $cartItem->price = $product->getFinalPrice($cartItem->qty);
        }

        return redirect()->route('order.details');

    }
}
