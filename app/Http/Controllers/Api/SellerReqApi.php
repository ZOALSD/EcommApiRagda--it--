<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\Area;
use App\Model\SellerOrder;
use Illuminate\Support\Facades\Auth;

class SellerReqApi extends Controller
{

    public function SellerOrder()
    {
        $data = SellerOrder::where(['seller_id' => Auth::id(), 'stutus_clint' => 1])->with(['card', 'clint'])->get();
        $area = Area::get();

        return response()->json(['stuts' => true, 'Data' => $data, 'area' => $area], 200);
    }

    public function ClintProData($id)
    {
        $data = CardProData::where('card_data_id', $id)->with('produact')->get();
        return response()->json($data, 200);
    }

}
