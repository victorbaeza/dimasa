<?php

use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shipping_methods')->insert([
            [
                'id' => 1,
                'description' => 'Envío Estandar (Precio transporte en península)',
                'cost' => 0,
                'default' => 1,
                'active' => 1,
            ]
        ]);
    }
}
