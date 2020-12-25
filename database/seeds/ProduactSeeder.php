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

                'user_id' => 1,
                'color_name' => $i,
                'cate_name' => 'name pro' . $i,
                'price' => $i . '000',
                'size_id' => $i,
                'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                'cate_image' => 'produactcoontroller/' . $i . '.jpg',
                'cate_id' => $i,
            ]);

        }

        for ($x = 1; $x <= 3; $x++) {

            if ($x == 1) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y,
                        'color_name' => $y,
                        'cate_name' => 'ملابس رجالي رقم' . $y,
                        'price' => $y . '000',
                        'size_id' => $y,
                        'cate_disc' => 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
                        'cate_image' => 'produactcoontroller/' . $y . '.jpg',
                        'cate_id' => 7,
                    ]);
                }

            }

            if ($x == 2) {
                for ($y = 1; $y <= 3; $y++) {
                    Produact::create([

                        'user_id' => $y,
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

                        'user_id' => $y,
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
