<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders_status')->insert([
            ['id' => 1, 'name' => 'Pendiente'],
            ['id' => 2, 'name' => 'Pagado'],
            ['id' => 3, 'name' => 'Enviado'],
            ['id' => 4, 'name' => 'Completado'],
            ['id' => 5, 'name' => 'Cancelado'],
        ]);
    }
}
