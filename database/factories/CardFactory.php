<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'produact_id' => $faker->randomNumber(1),
        'seller_id' =>$faker->randomNumber(1),
        'clint_id' =>$faker->randomNumber(1),
        'process_id' =>$faker->randomNumber(1),
        'city_id' =>$faker->randomNumber(1),
        'area_id' =>$faker->randomNumber(1),
        'quantity' =>$faker->randomNumber(1),
        'price' =>$faker->randomNumber(2),
        'total' =>$faker->randomNumber(1),
        'stutus' =>1
    ];
});