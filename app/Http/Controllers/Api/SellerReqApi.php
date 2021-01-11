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
        $data = SellerOrder::where(['seller_id' => Auth::id(), 'stutus_seller' => 1])->with('deliver')->get();
        return response()->json(['stuts' => true, 'Data' => $data,
        ], 200);
    }

    public function SellerOrderDetils($id)
    {
        $cardID = SellerOrder::where('id', $id)->value('card_cata_id');
        $data = CardProData::where('id', $cardID)->with('produact')->get();
        return response()->json($data, 200);
    }

}
