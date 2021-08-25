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
use Client;
use Product;
use ProductCategory;
use Purchase;
use PurchaseLine;
use PurchasePaymentForm;
use RecordNumeration;
use Vendor;

class PurchaseController extends Controller
{

  	// Aqui definimos el middleware que va a tener el controlador, es decir, los permisos que ha de tener el usuario o lo echaremos fuera
  	public function __construct()
  	{
    		// Todas las llamadas aqui van a necesitar que el usuario sea admin
    		$this->middleware('admin');
  	}


    public function list(Request $request)
    {
        $purchases = Purchase::query();
        $q = $request->input('q');

        // if ($q) $purchases = $purchases->where('purchases.observations', 'LIKE', '%' .$q. '%')->orWhere('purchases.number', 'LIKE', '%' .$q. '%');

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $purchases = Helper::do_orderColumn($purchases, $order_col, $order, 'id', 'DESC');

        $purchases = $purchases->select('purchases.*');
        $purchases = $purchases->paginate(Helper::NUM_PAGED_RESULTS);

        return view('admin.purchases.list', compact('purchases', 'q', 'order_col', 'order'));
    }

    public function create()
    {
        return view('admin.purchases.create');
    }

    public function do_create(Request $request)
    {
        dd($request->all());

        $purchase = new Purchase;
        $this->saveData($purchase, $request, true);

        return redirect()->action('PurchasesController@list')->with('success', 'La compra ha sido creado correctamente');
    }

    private function saveData(Purchase $purchase, Request $request, $new=false)
    {
        if ($new)
        {
            $purchase->date = date('Y-m-d H:i:s');
        }

        $vendor = Vendor::find($request->input('vendor_id'));

        $purchase->vendor_id = $vendor->id;
        $purchase->status_id = $request->input('status_id');
        $purchase->payment_form_id = $request->input('payment_form_id');
        $purchase->observations = $request->input('observations');
        $purchase->save();

        if (!$new)
        {
            // Fichero de la factura
            if ($request->hasFile('invoice_file'))
            {
                $purchase->uploadFile($request->file('invoice_file'));
            }

            // Editar las líneas de la compra
            foreach ($purchase->Lines as $line)
            {

            }
        }

        $num_lines = intval($request->input('num_lines'));
        for ($i=1 ; $i<=$num_lines ; $i++)
        {
            $product = Product::find($request->input('add_product_'.$i));

            $purchase_line = new PurchaseLine;
            $purchase_line->purchase_id = $purchase->id;
            $purchase_line->product_id = $request->input('add_product_'.$i);
            $purchase_line->quantity = intval($request->input('add_quantity_'.$i));
            $purchase_line->price = $request->input('add_price_'.$i);
            $purchase_line->save();
        }

    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);

        return view('admin.purchases.edit', compact('purchase'));
    }

    public function do_edit(Request $request)
    {
        $purchase = Purchase::findOrFail($request->id);

        dd($purchase);

        $this->saveData($purchase, $request);

        return redirect()->back()->with('success', 'La compra ha sido modificado correctamente');
    }


}
