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
                'cost' => 0,
                'default' => 1,
                'active' => 1,
            ]
        ]);


        DB::table('shipping_methods_translations')->insert([
            [
                'id' => 1,
                'shipping_method_id' => 1,
                'locale' => 'es',
                'description' => 'Envío Estandar (Precio transporte en península)',
            ]
        ]);
    }
}
