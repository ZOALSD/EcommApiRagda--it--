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
        for($i =1 ; $i<=10 ; $i++){

        
        Produact::create([

            'user_id'=>1,
            'color_id'=> $i,
            'cate_name'=> 'name pro --:'.$i,
            'price'=> $i.'000',
            'size_id'=> $i,
            'cate_disc'=> 'this pergragrph descrpation via zools3d  this pergragrph descrpation via zools3d this pergragrph descrpation via zools3d ',
            'cate_image' => 'produactcoontroller/'.$i.'.jpg',
            'cate_id'=> $i
        ]);

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