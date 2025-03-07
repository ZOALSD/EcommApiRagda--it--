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

        Categories::create([ //1
            'name' => 'موبايلات',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //2
            'name' => 'ملابس',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //3
            'name' => 'عربات',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //4
            'name' => 'اواني منزلية',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //5
            'name' => 'اثاثات',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //6
            'name' => 'طعام',
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //7
            'name' => 'رجالي',
            'parent_id' => 2,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //8
            'name' => 'نسائي',
            'parent_id' => 2,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);
        Categories::create([ //9
            'name' => 'اطفال',
            'parent_id' => 2,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //10
            'name' => 'تويوتا',
            'parent_id' => 3,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //11
            'name' => 'هونداي',
            'parent_id' => 3,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //12
            'name' => 'تويوتا اكسنت',
            'parent_id' => 10,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //13
            'name' => 'تويوتا برادو',
            'parent_id' => 10,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //14
            'name' => 'تويوتا بوكسي',
            'parent_id' => 10,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //15
            'name' => ' هونداي اكسنت',
            'parent_id' => 11,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //16
            'name' => ' هونداي برادو',
            'parent_id' => 11,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //17
            'name' => ' هونداي بوكسي',
            'parent_id' => 11,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //18
            'name' => 'ملابس رجالي صغير',
            'parent_id' => 7,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //19
            'name' => 'ملابس رجالي متوسط',
            'parent_id' => 7,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

        Categories::create([ //20
            'name' => 'ملابس رجالي كبير',
            'parent_id' => 7,
            'image_cate' => 'CategoriesImage/default.jpg',
        ]);

    }
}
