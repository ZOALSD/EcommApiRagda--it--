<?php

namespace App\Http\Controllers\Report;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\SellerOrder;
use PDF;

class SellerInviceController extends Controller
{
    public function Seller($id)
    {
        $title = "فاتورة التأجر : ";
        $invoce = SellerOrder::where('id', $id)->first();
        $CardInfo = CardData::where('id', $invoce->card_cata_id)->first();
        $CardPro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();

        $pdf = PDF::loadView('report.SellerInvce', compact('title', 'invoce', 'CardInfo', 'CardPro'));
        return $pdf->stream('sellersInvce-' . $id . '-.pdf');
    }
}
