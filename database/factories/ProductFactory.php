<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Product as Product;
use ProductCategory as ProductCategory;
use ProductBrand as ProductBrand;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name' => 'Producto '.$faker->name(),
        'category_id' => ProductCategory::pluck('id')[$faker->numberBetween(0, ProductCategory::count()-1)],
        'brand_id' => ProductBrand::pluck('id')[$faker->numberBetween(0, ProductBrand::count()-1)],
        'buy_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10),
        'price_comparison' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 500),
        'VAT' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'stock' => $faker->numberBetween($min = 0, $max = 100000),
        'sku' => Str::random(10),
        'ean_code' => $faker->randomNumber(),
        'reference' => Str::random(7),
        'slug' => $faker->slug(),
    ];
});
