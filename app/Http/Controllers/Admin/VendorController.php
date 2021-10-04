<?php namespace App\Http\Controllers\Admin;

// Clases laravel
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use DB;
use Illuminate\Http\Request;

// Clases MERP
use Helper;
use User;
use UserType;
use Vendor;
use PaymentForm;
use PurchasePaymentForm;

class VendorController extends Controller
{

  	// Aqui definimos el middleware que va a tener el controlador, es decir, los permisos que ha de tener el usuario o lo echaremos fuera
  	public function __construct()
  	{
    		// Todas las llamadas aqui van a necesitar que el usuario sea admin
    		// $this->middleware('admin');
  	}

    public function list(Request $request)
    {
        $vendors = Vendor::whereNotNull('id');
        $q = $request->input('q');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $vendors = Helper::do_orderColumn($vendors, $order_col, $order, 'id', 'DESC');

        $vendors = $vendors->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.vendors.list', compact('vendors', 'q', 'order_col', 'order'));
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function do_create(Request $request)
    {
        $vendor = new Vendor;
        $this->saveData($vendor, $request, true);

        return redirect()->action('VendorsController@list')->with('success', 'El proveedor ha sido creado correctamente');
    }

    private function saveData(Vendor $vendor, Request $request, $new=false)
    {

        $vendor->name = $request->input('name');
        $vendor->company_name = $request->input('company_name');
        $vendor->alias = $request->input('alias');
        $vendor->NIF = $request->input('NIF');
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');
        $vendor->city = $request->input('city');
        $vendor->zip = $request->input('zip');
        $vendor->province = $request->input('province');
        $vendor->country = $request->input('country');
        $vendor->payment_form_id = $request->input('payment_form_id');
        $vendor->contact_name = $request->input('contact_name');
        $vendor->website = $request->input('website');
        $vendor->observations = $request->input('observations');
        $vendor->save();

    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);

        return view('admin.vendors.edit', compact('vendor'));
    }

    public function do_edit(Request $request)
    {
        $vendor = Vendor::findOrFail($request->id);

        $this->saveData($vendor, $request);

        return redirect()->back()->with('success', 'El proveedor ha sido modificado correctamente');
    }


    // Formas de Pago
    public function listPaymentForms(Request $request)
    {
        $payment_forms = PaymentForm::query();
        $q = $request->input('q');

        if ($q) $payment_forms = $payment_forms->where('name', 'LIKE', '%' .$q. '%')->orWhere('short_name', 'LIKE', '%' .$q. '%')->orWhere('description', 'LIKE', '%' .$q. '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $payment_forms = Helper::do_orderColumn($payment_forms, $order_col, $order, 'id', 'DESC');

        $payment_forms = $payment_forms->paginate(Helper::NUM_PAGED_RESULTS);

        return view('admin.clients.payment_forms.list', compact('payment_forms', 'q', 'order_col', 'order'));
    }

    public function createPaymentForm()
    {
        return view('admin.clients.payment_forms.create');
    }

    public function do_createPaymentForm(Request $request)
    {
        $payment_form = new PaymentForm;
        $this->saveDataPaymentForm($payment_form, $request);

        return redirect()->action('ClientsController@listPaymentForms')->with('success', 'La forma de pago ha sido creada correctamente');
    }

    private function saveDataPaymentForm(PaymentForm $payment_form, Request $request)
    {
        $payment_form->name = $request->input('name');
        $payment_form->short_name = $request->input('short_name');
        $payment_form->description = $request->input('description');
        $payment_form->save();
    }

    public function editPaymentForm($id)
    {
        $payment_form = PaymentForm::findOrFail($id);

        return view('admin.clients.payment_forms.edit', compact('payment_form'));
    }

    public function do_editPaymentForm(Request $request)
    {
        $payment_form = PaymentForm::findOrFail($request->id);
        $this->saveDataPaymentForm($payment_form, $request);

        return redirect()->back()->with('success', 'La forma de pago ha sido modificada correctamente!');
    }


}
