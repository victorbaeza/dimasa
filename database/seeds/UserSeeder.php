<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users_types')->insert([
            [
                'id' => 1,
                'name' => 'admin'
            ]
        ]);

        DB::table('users')->insert([
            [
                'id' => 1,
                'user' => 'admin',
                'type_id' => 1,
                'name' => 'Joaquin Xia',
                'email' => 'jxia@ibermedia.com',
                'password' => '$2y$10$Y.B9Dqx5e0XmGuavCtOpW.X.obaOJ/VZFV3mwsyWFXmqTGGjQ5z4K'
            ]
        ]);
    }
}
