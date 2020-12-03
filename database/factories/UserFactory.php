<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "Ragda",
        'phone' => '09999',
        'password' => bcrypt(00000),
        'year' => $faker->year($max ='now'),
        'email' => $faker->unique()->safeEmail,
        'type'  => 1
    ];
});