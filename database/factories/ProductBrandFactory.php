<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ProductBrand as ProductBrand;
use Faker\Generator as Faker;

$factory->define(ProductBrand::class, function (Faker $faker) {

    $name = $faker->name();

    return [
        //
        'name' => 'Marca '.$name,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'slug' => Str::slug($name),
    ];
});
