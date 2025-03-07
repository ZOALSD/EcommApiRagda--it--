<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->name ,
        'image_cate' => 'CategoriesImage/default.jpg'

    ];
});