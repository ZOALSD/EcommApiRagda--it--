<?php

use App\Model\Produact;
use Illuminate\Database\Seeder;

class ProduactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Produact::class, 10)->create();
        for ($i = 1; $i <= 6; $i++) {

            Produact::create([

                'user_id' => 7,
                'color_name' => $i,
                'cate_name' => 'name pro' . $i,
                'price' => $i . '000',
                'size_id' => $i,
                'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                'cate_image' => 'produactcoontroller/' . $i . '.jpg',
                'cate_id' => $i,
            ]);

        }

        for ($x = 1; $x <= 11; $x++) {

            if ($x == 1) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'ملابس رجالي مقاس صغير' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 18,
                    ]);
                }

            }

            if ($x == 2) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'ملابس نسائي رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 8,
                    ]);
                }

            }

            if ($x == 3) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'ملابس اطفالي رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 9,
                    ]);
                }

            }

            if ($x == 4) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'اكسنت تويوتا رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Towttow Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 12,
                    ]);
                }

            }

            if ($x == 5) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'تويوتا برادو  رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Hownidy Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 13,
                    ]);
                }

            }

            if ($x == 6) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => ' تويوتا بوكسي  رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Hownidy Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 14,
                    ]);
                }

            } //

            if ($x == 7) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => ' هونداي اكسنت رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Hownidy Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 15,
                    ]);
                }

            } //

            if ($x == 8) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'هونداي برادو رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Hownidy Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 16,
                    ]);
                }

            } //

            if ($x == 9) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => ' هونداي بوكسي رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'car Accent From Hownidy Action  ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 17,
                    ]);
                }

            } //

            if ($x == 10) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'ملابس رجالي مقاس متوسط' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 19,
                    ]);
                }

            }

            if ($x == 11) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y + 7,
                        'color_name' => $y,
                        'cate_name' => 'ملابس رجالي مقاس كبير' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 20,
                    ]);
                }

            }

        }

        /*

    'user_id'=>1,
    'color_id'=>factory(Color::class),
    'cate_name'=>$this->faker->title,
    'price'=>$this->faker->buildingNumber,
    'size_id'=>factory(Size::class),
    'cate_disc'=>$this->faker->paragraph,
    'cate_image' =>$this->faker->imageUrl($width = 640, $height = 480),
    'cate_id'=>factory(Categories::class)
     */
    }
}
