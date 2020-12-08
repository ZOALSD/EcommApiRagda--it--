<?php

use App\QRCodeOrder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class QRcodeOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i<= 5 ; $i++){
            $value = 'Ahmed'.$i;
        QRCodeOrder::create([
        
        "client_id"=>1, 
        "seller_id"=>1,
        "delivery_id"=>1 ,
        "card_process_id"=>$i ,
        "qrcode"=> Hash::make($value) ,

        ]);
    }
  }
}