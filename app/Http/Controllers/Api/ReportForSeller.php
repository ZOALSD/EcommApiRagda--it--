<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Facades\Auth;

class ReportForSeller extends Controller
{
    public function Report()
    {
        $invoce = SellerOrder::where('seller_id', Auth::id())->with(['seller', 'deliver', 'clint'])->get();

        return response()->json($invoce, 200);

    }

    public function ReportDetils($id)
    {

        $Invoce_Seller = SellerOrder::select('id', 'deliver_id')->where('id', $id)->with('deliver')->get();
        $invoce = SellerOrder::where('id', $id)->first();
        $CardPro = CardProData::select('id', 'quantity', 'produact_id', 'price', 'total')->where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => Auth::id()])->with('Pro_Name')->get();

        $total = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => Auth::id()])->sum('total');

        return response()->json($CardPro, 200);

    }
}
