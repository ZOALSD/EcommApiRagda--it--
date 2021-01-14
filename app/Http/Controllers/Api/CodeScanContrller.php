<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\SellerOrder;

class CodeScanContrller extends Controller
{
    public function ScanfromSeller($qu)
    {
//deliver_stutus
        $order = SellerOrder::where('qrcode', $qu)->first();

        CardData::where('id', $order->card_cata_id)->update(['order_stutus' => 0]);
        CardProData::where('card_cata_id', $order->card_cata_id);
        SellerOrder::find($order->id)->update(['stutus_seller' => 1]);

    }
}
