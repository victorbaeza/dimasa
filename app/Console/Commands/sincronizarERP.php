<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Client;
use ProductCategory;
use Product;
use Vendor;


class sincronizarERP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sincronizarERP';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para sincronizar la información del ERP';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // $ultima_sincronizacion = Sincronizacion::orderBy('fecha', 'DESC')->first();
        //
        // $fecha_sync = $ultima_sincronizacion->fecha;
        $fecha_sync = '2021-06-01 00:00:00';
        $this->sincronizarClientes($fecha_sync);
        $this->sincronizarProveedores($fecha_sync);
        $this->sincronizarFamilias(); // Familias equivale a categorías de productos
    }


    // Funciones
    private function sincronizarClientes ($fecha_sync)
    {
        $clientes_erp = DB::connection('mysql_erp')->select('SELECT * FROM clientes WHERE FechaModif>='.$fecha_sync);

        foreach ($clientes_erp as $cliente_erp)
        {

            $client = Client::where('erp_id', $cliente_erp->Cliente)->first();
            if (!$client)
            {
                $client = new Client;
                $client->erp_id = $cliente_erp->Cliente;
            }

            $client->name = $cliente_erp->Nombre;
            $client->company_name = $cliente_erp->Denominación;
            $client->dni = $cliente_erp->NIF;
            $client->address = $cliente_erp->Dirección;
            $client->city = $cliente_erp->Población;
            $client->province = $cliente_erp->Provincia;
            $client->postal_code = $cliente_erp->CP;
            $client->phone = $cliente_erp->Teléfono;
            $client->email = $cliente_erp->email;

            // IVA
            $client->iva_regimen = $cliente_erp->IvaRégimen;
            $client->iva_clase = $cliente_erp->IvaClase;
            $client->riesgo_max = $cliente_erp->RiesgoMáximo;

            $client->observations = $cliente_erp->Observaciones;

            $client->save();
        }
    }

    private function sincronizarProveedores ($fecha_sync)
    {
        $proveedores_erp = DB::connection('mysql_erp')->select('SELECT * FROM proveedores WHERE FechaModif>='.$fecha_sync);

        foreach ($proveedores_erp as $proveedor_erp)
        {

            $vendor = Client::where('erp_id', $proveedor_erp->Proveedor)->first();
            if (!$vendor)
            {
                $vendor = new Vendor;
                $vendor->erp_id = $proveedor_erp->Proveedor;
            }

            $vendor->name = $proveedor_erp->Nombre;
            $vendor->company_name = $proveedor_erp->Denominación;
            $vendor->dni = $proveedor_erp->NIF;
            $vendor->address = $proveedor_erp->Dirección;
            $vendor->city = $proveedor_erp->Población;
            $vendor->province = $proveedor_erp->Provincia;
            $vendor->postal_code = $proveedor_erp->CP;
            $vendor->country = $proveedor_erp->Pais;
            $vendor->phone = $proveedor_erp->Teléfono;
            $vendor->email = $proveedor_erp->email;

            $vendor->website = $proveedor_erp->PaginaWeb;

            $vendor->observations = $cliente_erp->Observaciones;

            $vendor->save();
        }
    }

    private function sincronizarFamilias ()
    {
        $familias_padre = DB::connection('mysql_erp')->select('SELECT * FROM familias WHERE EsSubFamilia="N"');
        foreach ($familias_padre as $familia)
        {
            $category = ProductCategory::where('erp_id', $familia->Familia)->first();
            if (!$category)
            {
                $category = new ProductCategory;
                $category->erp_id = $familia->Familia;
            }

            $category->name = $familia->Descripción;
            $category->comision = $familia->Comisión;
            $category->incremento_pvp = $familia->IncrementoPVP;

            $category->save();
        }

        $familias_hijo = DB::connection('mysql_erp')->select('SELECT * FROM familias WHERE EsSubFamilia="S"');
        foreach ($familias_hijo as $familia)
        {
            $parent_category = ProductCategory::where('erp_id', $familia->FamiliaOrigen)->first();
            if ($parent_category)
            {
                $category = ProductCategory::where('erp_id', $familia->Familia)->first();
                if (!$category)
                {
                    $category = new ProductCategory;
                    $category->erp_id = $familia->Familia;
                }

                $category->parent_id = $parent_category->id;
                $category->name = $familia->Descripción;
                $category->comision = $familia->Comisión;
                $category->incremento_pvp = $familia->IncrementoPVP;

                $category->save();
            }
        }
    }

    private function sincronizarArticulos ($fecha_sync)
    {
        $articulos_erp = DB::connection('mysql_erp')->select('SELECT * FROM artículos WHERE FechaModif>='.$fecha_sync);

        foreach ($articulos_erp as $articulo)
        {
            $product = Product::where('erp_id', $articulo->Artículo)->first();
            if (!$product) // Si el artículo es de alta nueva
            {
                $product = new Product;
                $product->erp_id = $articulo->Artículo;

                $category = ProductCategory::where('erp_id', $articulo->Familia)->first();
                if ($category) $product->category_id = $category->id;

                $sub_category = ProductCategory::where('erp_id', $articulo->SubFamilia)->first();
                if ($sub_category) $product->sub_category_id = $sub_category->id;

                $vendor = Vendor::where('erp_id', $articulo->Proveedor)->first();
                if ($vendor) $product->vendor_id = $vendor->id;
            }

            $product->name = $articulo->Descripción;
            $product->buy_price = $articulo->PrecioMedCompraEu;
            $product->price = $articulo->PVPGralSinIVAEu;
            $product->discount = $articulo->Descuento;

            $iva_importe = $articulo->PVPGralConIVAEu - $articulo->PVPGralSinIVAEu;
            $iva = $iva_importe / $articulo->PVPGralConIVAEu;

            $product->VAT = $iva;

            
            $product->save();
        }

    }
}
