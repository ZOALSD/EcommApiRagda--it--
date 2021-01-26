<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ReportForSeller extends Controller
{
    public function Report()
    {

        $invoce = SellerOrder::where('id', $id)->get();
        $percent = User::where('id', $invoce->seller_id)->value('clint_perce');
        $CardInfo = CardData::where('id', $invoce->card_cata_id)->first();
        $deliver_Percent = CardData::where('id', $invoce->card_cata_id)->value('deliver_Percent');
        $CardPro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();

        $total = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->sum('total');

    }
}
