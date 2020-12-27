<?php

use App\Model\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'area_name' => 'الخرطوم',
        ]);

        Area::create([
            'area_name' => 'ام درمان',
        ]);

        Area::create([
            'area_name' => 'بحري',
        ]);
    }
}
