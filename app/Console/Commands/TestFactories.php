<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Client;
use ProductCategory;
use ProductBrand;
use Product;
use Order;
use OrderLine;
use Vendor;

class TestFactories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestFactories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para ejecutar los factories e insertar datos de forma masiva en las tablas correspondientes en la DB';

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
        // Proveedores
        $vendors = factory(Vendor::class, 5)->create();

        // Productos
        $product_categories = factory(ProductCategory::class, 5)->create();
        $product_brands = factory(ProductBrand::class, 5)->create();
        $products = factory(Product::class, 10)->create();

        // Pedidos
        $orders = factory(Order::class, 10)->create();

        echo 'Factories ejecutadas!';
    }
}
