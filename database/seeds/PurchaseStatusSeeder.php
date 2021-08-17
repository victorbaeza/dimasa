<?php

use Illuminate\Database\Seeder;

class PurchaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('purchases_status')->insert([
            ['id' => 1, 'name' => 'Realizado'],
            ['id' => 2, 'name' => 'Pendiente de pago'],
            ['id' => 3, 'name' => 'Pagado'],
            ['id' => 4, 'name' => 'Enviado'],
            ['id' => 5, 'name' => 'Completado'],
        ]);
    }
}
