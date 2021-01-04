<?php

use App\Model\CardData;
use Illuminate\Database\Seeder;

class CardDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            if ($i == 1) {
                $area = 1;
                $village = 2;
                $flg = 'عافرة';
                $order_num = 1;
                $del = 14;

            } elseif ($i == 2) {
                $area = 2;
                $village = 4;
                $flg = 'جامع الخليفة';
                $order_num = 2;
                $del = 15;
            } else {
                $del = 11 + $i;
                $area = 3;
                $village = 7;
                $flg = 'مسرح خضر بشير';
                $order_num = 3;
            }
            CardData::create([
                "clint_id" => 2,
                "area_id" => $area,
                "village_id" => $village,
                "near_flg" => $flg,
                "order_num" => $order_num,
                // "deliver_id" => $del,
                'clint_stutus' => 1,
                "qr_code" => Hash::make($i . time() . round(3)), // "stutus" => "",
            ]);
        }
    }
}
