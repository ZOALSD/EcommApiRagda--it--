<?php

use App\Model\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Categories::class ,10)->create();

        Categories::create([
            'name' => 'موبايلات' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);

        Categories::create([
            'name' => 'ملابس' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);


        Categories::create([
            'name' => 'عربات' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);


        Categories::create([
            'name' => 'اواني منزلية' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);

        Categories::create([
            'name' => 'اثاثات' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);

        Categories::create([
            'name' => 'طعام' ,
            'image_cate' => 'CategoriesImage/default.jpg'
        ]);
    }
}