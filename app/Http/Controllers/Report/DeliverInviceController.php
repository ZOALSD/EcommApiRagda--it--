<?php

namespace App\Http\Controllers\Report;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\SellerOrder;
use PDF;

class DeliverInviceController extends Controller
{
    public function deliver($id)
    {
        $title = "فاتورة مندوب التوصيل : ";
        $invoce = SellerOrder::where('id', $id)->first();
        $card = CardData::where('id', $invoce->card_cata_id)->first();
        $pro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();

        $pdf = PDF::loadView('report.DeliverInvice', compact('title', 'invoce', 'card', 'pro'));
        return $pdf->stream('sellersInvce-' . $id . '-.pdf');
    }
}
