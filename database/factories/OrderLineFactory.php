<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use OrderLine as OrderLine;
use Faker\Generator as Faker;
use Product as Product;

$factory->define(OrderLine::class, function (Faker $faker) {

    $product = Product::inRandomOrder()->first();

    return [
        //
        'product_id' => $product->id,
        'product_name' => $product->name,
        'quantity' => $faker->numberBetween($min = 1, $max = 10),
        'price_unit' => $product->price,
        'VAT' => $product->VAT,
    ];
});
