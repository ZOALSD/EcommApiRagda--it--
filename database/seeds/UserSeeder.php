<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create();

        
        for($i =1 ; $i<=15 ; $i++){

             /*   if($i<= 5){
                    User::create([
                        'name' => 'Clint'.$i,
                        'email' => 'clint'.$i.'@me.com',
                        'password' => Hash::make($i.$i.$i.$i.$i),
                        'phone' => $i.$i.$i.$i.$i,
                        'type' => 1
                    ]);
                }

                if($i<= 10){
                    $x= $i-5;
                    User::create([
                        'name' => 'Seller'.$x,
                        'email' => 'Seller'.$x.'@me.com',
                        'password' => Hash::make($x.$x.$x.$x),
                        'phone' => $x.$x.$x.$x,
                        'type' => 2
                    ]);
                }

                if($i<= 15){
                    $y= $i-10;
                    User::create([
                        'name' => 'Delivery'.$y,
                        'email' => 'Delivery'.$y.'@me.com',
                        'password' => Hash::make($y.$y.$y),
                     //   'phone' => $y.$y.$y,
                        'type' => 2
                    ]);
                }*/


        }
        factory(User::class,1)->create();
    }
}