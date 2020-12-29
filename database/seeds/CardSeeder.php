<?php

use App\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Card::class ,10)->create();
        for ($i = 1; $i <= 10; $i++) {

            if ($i == 1) {
                $clint = 1;
                $seller = 1;
                $process = 1;
                $area = 1;
                $village = 2;
                $quantity = 3;
            } elseif ($i <= 3) {
                $clint = 2;
                $seller = 1;
                $process = 2;
                $area = 2;
                $village = 4;
                $quantity = 2;
            } elseif ($i <= 6) {
                $quantity = 1;
                $village = 7;
                $area = 3;
                $process = 3;
                $clint = 3;
                if ($i == 6) {
                    $seller = 2;
                } else {
                    $seller = 3;
                }

            } else {
                $quantity = 2;
                $village = 9;
                $process = 4;
                $clint = 4;
                if ($i == 7) {
                    $seller = 2;
                } elseif ($i == 8) {
                    $seller = 3;

                } else {
                    $seller = 4;
                }

            }

            Card::create([
                "produact_id" => $i,
                "seller_id" => $seller,
                "clint_id" => $clint,
                "process_id" => $process,
                "area_id" => $area,
                "village_id" => $village,
                "near_flg" => 'الجامع الكبير',
                "quantity" => $quantity,
                "price" => $i . '000',
                "total" => $quantity * $i . '000',
                "stutus" => 2,
            ]);
        }

    }

}
