<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Vendor as Vendor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name(),
        'company_name' => $faker->name(),
        'alias' => $faker->name(),
        'email' => $faker->email(),
        'phone' => $faker->e164PhoneNumber(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'province' => $faker->state(),
        'country' => $faker->country(),
        'observations' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'contact_name' => $faker->name(),
        'website' => $faker->domainName(),
    ];
});
