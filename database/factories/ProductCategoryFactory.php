<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use ProductCategory as ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProductCategory::class, function (Faker $faker) {

    $name = $faker->name();

    return [
        //
        'name' => 'Categoria '.$name,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'slug' => Str::slug($name),
    ];
});
