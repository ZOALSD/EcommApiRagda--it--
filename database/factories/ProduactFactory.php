<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\Model\Size;
use App\Model\Color;
use App\Model\Produact;
use App\Model\Categories;
use Faker\Generator as Faker;

$factory->define(Produact::class, function (Faker $faker) {
    return [
'admin_id'=>1,
'color_id'=>factory(Color::class),
'cate_name'=>$this->faker->title,
'quantity'=>$this->faker->buildingNumber,
'size_id'=>factory(Size::class),
'cate_disc'=>$this->faker->paragraph,
'cate_image' =>$this->faker->imageUrl($width = 640, $height = 480),
'cate_id'=>factory(Categories::class)
    ];
});