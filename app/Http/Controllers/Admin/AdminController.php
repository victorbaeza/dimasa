<?php namespace App\Http\Controllers\Admin;

// Clases laravel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use View;

// Clases propias
use Helper;
use HomeSlider;
use WebData;
use Contact;
use Order;
use Client;
use OrderLine;
use TrackingVisit;
use TrackingSession;
use Product;


class AdminController extends Controller
{

    public function getHomeAdmin()
    {
        $estadisticas = array();
        $hoy = strtotime(date('Y-m-d'));
        $date_7days_ago = date('Y-m-d', strtotime('-7 days', $hoy));
        $estadisticas['num_contactos'] = Contact::whereDate('created_at', '>=', $date_7days_ago)->count();
        $estadisticas['num_pedidos'] = Order::whereDate('date', '>=', $date_7days_ago)->count();
        $estadisticas['num_registrados'] = Client::where('created_at', '>=', $date_7days_ago)->count();
        $estadisticas['num_clientes_profesionales'] = Client::where('professional', 1)->count();
        $webdata = webData::findOrFail(1);
        $sliders = HomeSlider::all();

        return view('admin.index', compact('estadisticas', 'webdata', 'sliders'));
    }

    /*
    * Dashboards - Panel de control
    */
    public function getDashboards(Request $request)
    {
        $date_start = date('Y-m-d').' 00:00:00';
        $date_end = date('Y-m-d').' 23:59:59';

        $stats = array();

        $stats['pedidos'] = Order::whereBetween('date', [$date_start, $date_end])->get();
        $stats['total_ventas'] = $stats['pedidos']->sum('total');
        $stats['num_pedidos'] = $stats['pedidos']->count();
        $stats['valor_medio_pedidos'] = round($stats['total_ventas'] / max($stats['num_pedidos'], 1) * 100, 2);

        $stats['visitas'] = TrackingSession::whereBetween('created_at', [$date_start, $date_end])->get();
        $stats['total_visitas'] = $stats['visitas']->count();

        $stats['embudo_add_to_cart'] = TrackingSession::whereBetween('created_at', [$date_start, $date_end])->where('add_to_cart', 1)->count();
        $stats['embudo_add_to_cart_%'] = $stats['embudo_add_to_cart'] / max($stats['total_visitas'], 1) * 100;
        $stats['embudo_checkout'] = TrackingSession::whereBetween('created_at', [$date_start, $date_end])->where('checkout', 1)->count();
        $stats['embudo_checkout_%'] = round($stats['embudo_checkout'] / max($stats['total_visitas'], 1) * 100, 2);
        $stats['embudo_convertido'] = $stats['num_pedidos'];
        $stats['embudo_convertido_%'] = round($stats['num_pedidos'] / max($stats['total_visitas'], 1) * 100, 2);

        // Productos más vendidos
        $stats['productos_mas_vendidos'] = Product::join('orders_lines', 'orders_lines.product_id', 'products.id')
                                                  ->join('orders', 'orders.id', 'orders_lines.order_id')
                                                  ->whereBetween('orders.date', [$date_start, $date_end])
                                                  ->groupBy('products.id')
                                                  ->selectRaw('sum(orders_lines.quantity) AS total_sold, products.id AS id')
                                                  ->limit(5)->get();

        $stats['producto'] = array();
        foreach ($stats['productos_mas_vendidos'] as $producto)
        {
            $stats['producto'][$producto->id] = Product::translatedIn('es')->where('id', $producto->id)->first();
        }

        // Clientes recurrentes
        // $stats['clientes_recurrentes'] = Order::whereBetween('date', [$date_start, $date_end])->whereIn('client_id', function($query){
        //                                   $query->selectRaw('client_id, COUNT(*) AS c')->from(with(new Order)->getTable())
        //                                         ->whereRaw('COUNT(*)>1')->groupBy('client_id');
        //                                 })->get();
        $stats['pedidos_clientes_recurrentes'] = Order::whereIn('client_id', $stats['pedidos']->pluck('client_id')->toArray())->whereNotIn('id', $stats['pedidos']->pluck('id')->toArray())->get();
        $stats['num_clientes_recurrentes'] = $stats['pedidos_clientes_recurrentes']->count();
        $stats['clientes_recurrentes_%'] = round($stats['num_clientes_recurrentes'] / max($stats['num_pedidos'], 1) * 100, 2);
        $stats['num_clientes_primera_vez'] = $stats['num_pedidos'] - $stats['num_clientes_recurrentes'];
        $stats['clientes_primera_vez_%'] = round($stats['num_clientes_primera_vez'] / max($stats['num_pedidos'], 1) * 100, 2);

        // dd($stats);

        return view('admin.dashboards', compact('stats'));
    }

    //region Sliders
    public function do_createNewSlider(Request $request)
    {
        $slider = new HomeSlider;
        $slider->title = $request->input('title');
        $slider->url = $request->input('url');
        $slider->image = $slider->uploadImage($request->file('image'));
        $slider->alt = $request->input('title');
        $slider->save();

        return redirect()->back()->with('success', 'El slider ha sido añadido correctamente!');
    }

    public function activateSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->active = 1;
        $slider->save();

        return redirect()->back()->with('success', 'El slider ha sido activado correctamente!');
    }

    public function deactivateSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->active = 0;
        $slider->save();

        return redirect()->back()->with('success', 'El slider ha sido desactivado correctamente!');
    }

    public function deleteSlider($id)
    {
        $slider = HomeSlider::findOrFail($id);
        $slider->deleteImage();
        try {
            $slider->delete();
        } catch (\Exception $e) {
        }

        return redirect()->back()->with('success', 'El slider ha sido eliminado correctamente!');
    }
    //endregion

    //region Contact Form
    public function listContacts(Request $request)
    {
        $contacts = Contact::whereNotNull('id');

        $q = $request->input('q');
        if ($q != "") {
            $contacts = $contacts->where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');
        $contacts = Helper::do_orderColumn($contacts, $order_col, $order, 'id', 'DESC');

        $contacts = $contacts->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.contacts.list', compact('contacts', 'q', 'order_col', 'order'));
    }

    //endregion Contact Form

}
