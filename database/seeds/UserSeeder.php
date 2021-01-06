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

        for ($i = 1; $i <= 4; $i++) {

            if ($i == 1) {

                User::create([
                    'name' => "Ragda",
                    'phone' => 99999,
                    'password' => Hash::make(99999),
                    'year' => 1999,
                    'email' => 'Ragda@me.com',
                    'type' => 1,
                ]);
            }
            if ($i == 2) {
                for ($x = 1; $x <= 5; $x++) {
                    User::create([
                        'name' => 'Clint' . $x,
                        'email' => 'clint' . $x . '@me.com',
                        'password' => Hash::make($x . $x . $x . $x . $x),
                        'phone' => $x . $x . $x . $x . $x,
                        'type' => 1,
                        'year' => '199' . $i,

                    ]);}
            }
            if ($i == 3) {
                for ($x = 1; $x <= 5; $x++) {
                    if ($x <= 3) {
                        $area = $x;
                        $village = $x + 2;
                    } else {
                        $village = $x - 2;

                        $area = $x - 3;
                    }
                    User::create([
                        'name' => 'Seller' . $x,
                        'email' => 'Seller' . $x . '@me.com',
                        'password' => Hash::make($x . $x . $x . $x),
                        'phone' => "09" . $x . $x . $x . $x . "0000",
                        'year' => '199' . $i,
                        'type' => 2,
                        'area_id' => $area,
                        // 'photo',
                        // 'stuts',
                        'village_id' => $village,
                    ]);
                }
            }
            if ($i == 4) {
                for ($x = 1; $x <= 5; $x++) {
                    if ($x >= 3) {$area = 1;
                        $village = 2;
                        $stuts_delivery = 1;} elseif ($x == 4) {$area = 2;
                        $village = 4;
                        $stuts_delivery = null;} else { $area = 3;
                        $village = 7;
                        $stuts_delivery = null;}
                    User::create([
                        'name' => 'Delivery' . $x,
                        'email' => 'Delivery' . $x . '@me.com',
                        'password' => Hash::make($x . $x . $x),
                        'phone' => $x . $x . $x,
                        'year' => '199' . $i,
                        'type' => 3,
                        'area_id' => $area,
                        'village_id' => $village,
                        // 'photo',
                        // 'stuts',
                        //'stuts_delivery' => $stuts_delivery,
                    ]);
                }
            }

            // }
            // factory(User::class,1)->create();
        }
    }
}
