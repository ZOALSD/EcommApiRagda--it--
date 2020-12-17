<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  factory(User::class,1)->create();

        for($i=1 ; $i<=4 ; $i++){

        if($i == 1){ 

            User::create([
            'name' => "Ragda",
            'phone' => 99999,
            'password' => Hash::make(99999),
            'year' => 1999,
            'email' => 'Ragda@me.com',
            'type'  => 1
            ]);
        }
               if($i == 2){
                for($x =1;$x<= 5 ; $x++){
                    User::create([
                        'name' => 'Clint'.$x,
                        'email' => 'clint'.$x.'@me.com',
                        'password' => Hash::make($x.$x.$x.$x.$x),
                        'phone' => $x.$x.$x.$x.$x,
                        'type' => 1,
                         'year' => '199'.$i,

                    ]);}
                }

                if($i == 3){
                for($x =1;$x<= 5 ; $x++){
                    User::create([
                        'name' => 'Seller'.$x,
                        'email' => 'Seller'.$x.'@me.com',
                        'password' => Hash::make($x.$x.$x.$x),
                        'phone' => $x.$x.$x.$x,
                        'year' => '199'.$i,
                        'type' => 2
                    ]);
                }
            }

                if($i == 4){
                for($x =1;$x<= 5 ; $x++){

                    User::create([
                        'name' => 'Delivery'.$x,
                        'email' => 'Delivery'.$x.'@me.com',
                        'password' => Hash::make($x.$x.$x),
                        'phone' => $x.$x.$x,
                        'year' => '199'.$i,
                        'type' => 3
                    ]);
                }
            }


       // }
       // factory(User::class,1)->create();
       }
  }
}