<?php

use App\Model\Village;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::create([
            'area_id' => 1,
            'village_name' => 'المنشية',
        ]);

        Village::create([
            'area_id' => 1,
            'village_name' => 'الصحافة',
        ]);
        Village::create([
            'area_id' => 1,
            'village_name' => 'الرياض',
        ]);

        Village::create([
            'area_id' => 2,
            'village_name' => 'الشهداء',
        ]);
        Village::create([
            'area_id' => 2,
            'village_name' => 'الحارة',
        ]);

        Village::create([
            'area_id' => 3,
            'village_name' => 'الكدرو',
        ]);
        Village::create([
            'area_id' => 3,
            'village_name' => 'ام القرى',
        ]);

        Village::create([
            'area_id' => 3,
            'village_name' => 'شمبات',
        ]);
    }
}
