<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Coupon;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Client;
use Order;
use OrderLine;
use Helper;
use Redirect;
use ShippingMethod;
use Invoice;
use InvoiceLine;

class InvoiceController extends Controller
{


    public function list(Request $request)
    {
        $invoices = Invoice::whereNotNull('id');

        $q = $request->input('q');
        if (!empty($q)) {
            $invoices = $invoices->where('number', 'LIKE', '%' . $q . '%')->orWhere('observations', 'LIKE', '%' . $q . '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $invoices = Helper::do_orderColumn($invoices, $order_col, $order, 'id', 'ASC');

        $invoices = $invoices->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.invoices.list', compact('invoices', 'q', 'order_col', 'order'));
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function do_edit(Request $request)
    {
        $invoice = Order::findOrFail($request->input('id'));

        return redirect()->back()->with('success', 'La factura ha sido actualizada con éxito');
    }

}
