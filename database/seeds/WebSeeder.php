<?php

use Illuminate\Database\Seeder;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contacts_types')->insert([
            ['id' => 1, 'name' => 'WEB', 'description' => 'Contacto WEB normal'],
            ['id' => 2, 'name' => 'Trabaja con nosotros', 'description' => 'Formulario de trabaja con nosotros'],
            ['id' => 3, 'name' => 'Solicita presupuesto', 'description' => 'Formulario de solicitar presupuesto'],
        ]);

        DB::table('sitemaps_changefreq')->insert([
            ['id' => 1, 'name' => 'always'],
            ['id' => 2, 'name' => 'hourly'],
            ['id' => 3, 'name' => 'daily'],
            ['id' => 4, 'name' => 'weekly'],
            ['id' => 5, 'name' => 'monthly'],
            ['id' => 6, 'name' => 'yearly'],
            ['id' => 7, 'name' => 'never'],
        ]);

        DB::table('web_data')->insert([
            ['id' => 1],
        ]);
    }
}
