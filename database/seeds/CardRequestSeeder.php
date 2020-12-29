<?php

use App\Model\CardRequest;
use Illuminate\Database\Seeder;

class CardRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            if ($i == 1) {
                $card_data_id = 1;
                $pro = 1;
                $seller = 1;
                $quan = 2;
                $price = $i . '000';
            } elseif ($i <= 3) {
                $card_data_id = 2;
                $pro = $i;
                $seller = 2;
                $quan = $i;
                $price = $i . '000';
            } else {
                $card_data_id = 3;
                $pro = $i;
                if ($i == 4) {
                    $seller = 3;
                } else {
                    $seller = 4;
                }
                $quan = 2;
                $price = $i . '000';
            }
            CardRequest::create([
                'card_data_id' => $card_data_id,
                'produact_id' => $pro,
                'seller_id' => $seller,
                'quantity' => $quan,
                'price' => $price,
                'total' => $quan * $price,
            ]);
        }
    }
}
