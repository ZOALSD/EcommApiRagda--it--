<?php

use App\Model\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  factory(Size::class ,10)->create() ;

      Size::create([
          'size_name' => 'كرتونة' 
      ]);
    

    Size::create([
        'size_name' => 'شوال'
    ]);


    Size::create([
        'size_name' => 'كيلو'
    ]);

    Size::create([
        'size_name' => 'رطل'
    ]);

    Size::create([
        'size_name' => 'اردب'
    ]);


    Size::create([
        'size_name' => 'قنطار'
    ]);

    
    Size::create([
        'size_name' => 'دسته'
    ]);


    Size::create([
        'size_name' => 'حبة'
    ]);
    

    Size::create([
        'size_name' => 'وحدة'
    ]);
  
   }


}