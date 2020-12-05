<?php

use App\Model\Ads;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =1 ; $i <= 5 ; $i++){

        Ads::create([
            'ad_image' => 'ads/'.$i.'.jpg'
        ]);
    }

    }
}