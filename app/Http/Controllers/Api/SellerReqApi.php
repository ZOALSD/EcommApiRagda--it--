<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Facades\Auth;

class SellerReqApi extends Controller
{

    public function SellerOrder()
    {
        $data = SellerOrder::where(['seller_id' => Auth::id(), 'stutus_admin' => 1])->with('deliver')->get();
        return response()->json(['stuts' => true, 'Data' => $data], 200);
    }

    public function SellerOrderDone()
    {
        //this is Rong Stutus Show Changed After Check
        $data = SellerOrder::where(['seller_id' => Auth::id(), 'stutus_seller' => null])->with('deliver')->get();
        return response()->json(['stuts' => true, 'Data' => $data,
        ], 200);
    }

    public function SellerOrderDetils($id)
    {
        $cardID = SellerOrder::where('id', $id)->value('card_cata_id');
        $data = CardProData::where(['card_data_id' => $cardID, 'seller_id' => Auth::id()])->with('produact')->get();
        return response()->json($data, 200);
    }

    //تم التجهيز

    public function SellerDoneOrder($id)
    {
        //this is Rong Stutus Show Changed After Check
        $data = SellerOrder::where('id', $id)->update(['stutus_seller' => 1]);
        return response()->json(['stuts' => true, 'Message' => 'Ordre Ready',
        ], 200);
    }

}
