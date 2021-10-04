<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ShippingMethodSeeder::class);
        $this->call(PaymentFormSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(PurchaseStatusSeeder::class);

        $this->call(WebSeeder::class);
    }
}
