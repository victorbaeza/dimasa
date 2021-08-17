<?php

use Illuminate\Database\Seeder;

class PaymentFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('payment_forms')->insert([
            ['id' => 1, 'name' => 'RedSys', 'description' => 'TPV online del banco'],
            ['id' => 2, 'name' => 'PayPal', 'description' => 'PayPal'],
            ['id' => 3, 'name' => 'Stripe', 'description' => 'Stripe'],
            ['id' => 4, 'name' => 'Transferencia bancaria', 'description' => 'Transferencia bancaria, no es posible la validación'],
        ]);
    }
}
