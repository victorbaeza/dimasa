<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Redirect;
use View;
use Log;

// Clases propias
use Helper;
use Client;
use Order;
use OrderLine;
use OrderStatus;
use Coupon;
use ShippingMethod;
use PaymentForm;

class OrderController extends Controller
{

    //region Order
    public function list(Request $request)
    {
        $orders = Order::whereNotNull('id');

        $q = $request->input('q');
        if (!empty($q)) {
            $orders = $orders->where(function ($query) use ($q) {
                $query->where('number', 'LIKE', '%' . $q . '%')->orWhere('observations', 'LIKE', '%' . $q . '%');
            });
        }

        $e = $request->input('e');
        if (isset($e)) $orders = $orders->where('status_id', $e);

        $c = $request->input('c');
        if (isset($c)) $orders = $orders->where('name', 'LIKE', '%' . $c .'%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $orders = Helper::do_orderColumn($orders, $order_col, $order, 'id', 'DESC');

        $orders = $orders->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.orders.list', compact('order_col', 'order', 'orders', 'q', 'e', 'c'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    public function do_edit(Request $request)
    {
        $order = Order::findOrFail($request->input('id'));

        $order->observations = $request->input('observations');
        $order->save();

        return redirect()->back()->with('success', 'El pedido ha sido actualizado con éxito');
    }

    public function do_confirmPayment($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status_id !== OrderStatus::PENDING) return redirect()->back()->with('error', 'No es posible confirmar el pago de este pedido!');

        $order->status_id = OrderStatus::PAID;
        $order->save();

        // Enviar correo de confirmación al cliente


        return redirect()->back()->with('success', 'Se ha confirmado el pago del pedido correctamente!');
    }

    public function do_confirmShipment($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status_id !== OrderStatus::PAID) return redirect()->back()->with('error', 'El pedido debe estar pagado para poder generar la etiqueta de envio!');

        return view('admin.orders.generar_envio', compact('order'));
    }

    public function delete(Request $request, int $id){
        try {
            $order = Order::whereId($id)->first();
            if (in_array($order->status_id, OrderStatus::NOT_DELETEABLE_STATUS))
            {
              return redirect()->back()->with('error', 'No es posible eliminar un pedido confirmado y pagado!');
            }
            else
            {
              $order->delete();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'El pedido a eliminar no existe');
        }

        return redirect()->route('admin.orders.list')->with('success', 'El pedido ha sido borrada correctamente');
    }
    //endregion Order

    //region Shipping Methods
    public function listShipments(Request $request){
        $shipments = ShippingMethod::query();

        $q = $request->input('q');

        if (!empty($q))
            $shipments = $shipments->where('description', 'LIKE', '%' . $q . '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');

        $shipments = Helper::do_orderColumn($shipments, $order_col, $order,'id', 'DESC');

        $shipments = $shipments->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.orders.shipment.list', compact('shipments', 'q', 'order_col', 'order'));
    }

    public function createShipment()
    {
        return view('admin.orders.shipment.create');
    }

    public function do_createShipment(Request $request)
    {
        // $shipmentData = $this->getShipmentData($request);
        // if($shipmentData['default']){
        //     ShippingMethod::deletePreviousDefault();
        // }
        // $shipment = new ShippingMethod();
        // $shipment::create($shipmentData);

        $shipment = new ShippingMethod;

        $this->saveDataShippingMethod($shipment, $request, true);

        return redirect()->route('admin.shipment.list')->with('success', 'El método de envío ha sido creado correctamente');
    }

    private function saveDataShippingMethod (ShippingMethod $shipment, Request $request, $new=false)
    {
        $default = $shipment->default;

        $shipment->description = $request->input('description');
        $shipment->cost = $request->input('cost');
        $shipment->minimum_free = $request->input('minimum_free');
        $shipment->default = intval($request->input('default'));
        $shipment->active = intval($request->input('active'));
        $shipment->save();

        if (!$default && $shipment->default)
        {
            ShippingMethod::deletePreviousDefault();
        }
    }

    public function editShipment(int $id)
    {
        $shipment = ShippingMethod::findOrFail($id);

        return view('admin.orders.shipment.edit', compact('shipment'));
    }

    public function do_editShipment(Request $request, int $id)
    {
        $shipment = ShippingMethod::findOrFail($id);

        $this->saveDataShippingMethod($shipment, $request);

        return redirect()->route('admin.shipment.list')->with('success', 'El método de envío ha sido actualizado correctamente');
    }

    public function deleteShipment(Request $request, int $id){
        try {
            $shipment = ShippingMethod::whereId($id)->first();
            $shipment->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'No es posible eliminar este método de envío');
        }

        return redirect()->route('admin.shipment.list')->with('success', 'El método de envío ha sido borrada correctamente');
    }


    public function validateShipment(Request $request){
        $request->validate(ShippingMethod::$rules, ShippingMethod::$rulesMessages);
    }


    //endregion Shipping Methods

    //region Coupon
    public function listCoupons(Request $request){
        $coupons = Coupon::query();

        $q = $request->input('q');

        if (!empty($q))
            $coupons = $coupons->where('description','LIKE','%' . $q . '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $coupons = Helper::do_orderColumn($coupons, $order_col, $order);

        $coupons = $coupons->paginate(self::NUM_PAGED_RESULTS);
        return view('admin.orders.coupons.list', compact('coupons', 'q', 'order_col', 'order'));
    }

    public function createCoupon(){
        return view('admin.orders.coupons.create');
    }

    public function do_createCoupon(Request $request){
        $couponData = $this->getCouponData($request);
        $coupon = new Coupon();
        $coupon::create($couponData);

        return redirect()->route('admin.coupons.list')->with('success', 'El cupón ha sido creado correctamente');
    }

    public function editCoupon(int $id){
        $coupon = Coupon::findOrFail($id);

        return view('admin.orders.coupons.edit', compact('coupon'));
    }

    public function do_editCoupon(Request $request, int $id){
        $coupon = Coupon::findOrFail($id);

        $couponData = $this->getCouponData($request, $id);
        $coupon->fill($couponData);
        $coupon->save();

        return redirect()->route('admin.coupons.list')->with('success', 'El cupón ha sido modificado correctamente');
    }

    public function deleteCoupon(Request $request, int $id){
        try {
            $coupon = Coupon::whereId($id)->first();
            $coupon->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'El cupón a eliminar no existe');
        }

        return redirect()->route('admin.coupons.list')->with('success', 'El cupón ha sido borrada correctamente');
    }

    public function getCouponData(Request $request, int $id = 0){
        $this->validateCoupon($request, $id);

        return [
            'code' => $request->input('code'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'discount' => $request->input('discount'),
            'discount_type' => intval($request->input('discount_type')),
            'minimum_price' => $request->input('minimum_price'),
            'use_limit' => $request->input('use_limit')
        ];
    }

    public function validateCoupon(Request $request, int $id = 0){
        $request->validate(Coupon::rules($id), Coupon::$rulesMessages);
    }
    //endregion
}
