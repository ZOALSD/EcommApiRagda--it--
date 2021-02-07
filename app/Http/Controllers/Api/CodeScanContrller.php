<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\SellerOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodeScanContrller extends Controller
{
    public function ScanfromSeller(Request $req)
    {

        // $count = SellerOrder::where('qrcode', $req->qu)->count();

        $count = SellerOrder::where(['qrcode' => $req->qu, 'deliver_id' => Auth::id()])->count();

        if ($count == 1) {

            $order = SellerOrder::where('qrcode', $req->qu)->first();

            CardData::where('id', $order->card_cata_id)->update(['order_stutus' => 0]);

            CardProData::where(['card_data_id' => $order->card_cata_id,
                'seller_id' => $order->seller_id])
                ->update(['deliver_stutus' => 1]);
            SellerOrder::find($order->id)->update(['stutus_seller' => 1]);

            return response()->json(["stutus" => true, 'message' => "Done Delivered"], 200);

        } else {
            return response()->json(["stutus" => false, 'message' => "Already Request Delivered OR You are Not How Admin Selected"], 200);
        }
    }

    public function ScanfromClint(Request $req)
    {

        $conn = CardData::where(['qr_code' => $qu, 'order_stutus' => 1])->count();
        if ($conn == 1) {
            return response()->json(['stutus' => false, 'Message' => 'ALready Delivered'], 200);
        } else {
            CardData::where('qr_code', $req->qu)->update(['order_stutus' => 1]);

            return response()->json(['stutus' => true, 'Message' => 'Done Delivered Order'], 200);
        }

    }
}
