<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Order as Order;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Client as Client;
use OrderStatus as OrderStatus;
use PaymentForm as PaymentForm;
use OrderLine as OrderLine;
use ShippingMethod as ShippingMethod;
use Country as Country;


$factory->define(Order::class, function (Faker $faker) {

    $client = Client::inRandomOrder()->first();

    return [
        //
        'client_id' => $client->id,
        'date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        'number' => 'P'.$faker->randomDigitNotNull(),
        'status_id' => OrderStatus::pluck('id')[$faker->numberBetween(0, OrderStatus::count()-1)],
        'name' => $client->name,
        'NIF' => $client->dni,
        'email' => $faker->safeEmail(),
        'phone' => $faker->e164PhoneNumber(),

        'address' => $client->address,
        'city' => $client->city,
        'postal_code' => $client->postal_code,
        'province' => $client->province,
        'country_id' => $client->country_id,

        'shipping_address' => $client->shipping_address,
        'shipping_city' => $client->shipping_city,
        'shipping_postal_code' => $client->shipping_postal_code,
        'shipping_province' => $client->shipping_province,
        'shipping_country_id' => $client->country_id,

        'payment_form_id' => PaymentForm::pluck('id')[$faker->numberBetween(0, PaymentForm::count()-1)],
        'shipping_method_id' => ShippingMethod::pluck('id')[$faker->numberBetween(0, ShippingMethod::count()-1)],
        'uuid' => Str::uuid(),

        'subtotal' => 0,
        'shipping_cost' => 0,
        'VAT' => 0,
        'discount' => 0,
        'total' => 0,
    ];
});

$factory->afterCreating(Order::class, function ($order, $faker) {

    for ($i=1 ; $i<=$faker->numberBetween(1, 4) ; $i++ )
    {
        $order->Lines()->save(factory(OrderLine::class)->make());
    }
});
