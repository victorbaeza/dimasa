<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Client as Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Country as Country;


$factory->define(Client::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name(),
        'surname' => $faker->lastName(),
        'email' => $faker->email(),
        'phone' => $faker->e164PhoneNumber(),

        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'postal_code' => $faker->postcode(),
        'province' => $faker->state(),
        'country_id' => Country::ID_SPAIN,

        'shipping_address' => $faker->streetAddress(),
        'shipping_city' => $faker->city(),
        'shipping_postal_code' => $faker->postcode(),
        'shipping_province' => $faker->state(),
        'shipping_country_id' => Country::ID_SPAIN,

        'password' => Hash::make('123'),

        'observations' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
