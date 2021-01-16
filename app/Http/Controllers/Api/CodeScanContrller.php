<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\SellerOrder;

class CodeScanContrller extends Controller
{
    public function ScanfromSeller($qu)
    {
        $count = SellerOrder::where('qrcode', $qu)->where('stutus_seller', '!=', 1)->count();
        if ($count != 0) {

            $order = SellerOrder::where('qrcode', $qu)->first();

            CardData::where('id', $order->card_cata_id)->update(['order_stutus' => 0]);
            CardProData::where(['card_cata_id' => $order->card_cata_id,
                'seller_id' => $order->seller_id])
                ->update(['deliver_stutus' => 1]);
            SellerOrder::find($order->id)->update(['stutus_seller' => 1]);

            return response()->json(["stutus" => true, 'message' => "Done Delivered"], 200);

        } else {
            return response()->json(["stutus" => false, 'message' => "Already Request Delivered"], 200);
        }
    }

    public function ScanfromClint($qu)
    {

        $conn = CardData::where(['qr_code' => $qu, 'order_stutus' => 1])->count();
        if ($conn == 1) {
            return response()->json(['stutus' => false, 'Message' => 'ALready Delivered'], 200);
        } else {
            CardData::where('qr_code', $qu)->update(['order_stutus' => 1]);

            return response()->json(['stutus' => true, 'Message' => 'Done Delivered Order'], 200);
        }

    }
}
