<?php

namespace App\Http\Controllers\Report;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\SellerOrder;
use App\User;
use PDF;

class SellerInviceController extends Controller
{
    public function Seller($id)
    {
        $title = "فاتورة التأجر : ";
        $invoce = SellerOrder::where('id', $id)->first();
        $percent = User::where('id', $invoce->seller_id)->value('clint_perce');
        $CardInfo = CardData::where('id', $invoce->card_cata_id)->first();
        $deliver_Percent = CardData::where('id', $invoce->card_cata_id)->value('deliver_Percent');
        $CardPro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();

        $total = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->sum('total');

        $pdf = PDF::loadView('report.SellerInvce', compact('title', 'invoce', 'CardInfo', 'CardPro', 'percent', 'total', 'deliver_Percent'));
        return $pdf->stream('sellersInvce-' . $id . '-.pdf');
    }
}
