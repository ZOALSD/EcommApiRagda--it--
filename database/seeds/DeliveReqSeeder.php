<?php

use Illuminate\Database\Seeder;

class DeliveReqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 3; $i++) {
            DeliverReq::create([
                'deliver_id' => $i,
                'card_info_id' => $i,
                'stuts' => 0,
                // 'qr_code' => '',
            ]);
        }
    }
}
