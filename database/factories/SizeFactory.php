<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'size_name' => $faker->name
    ];
});