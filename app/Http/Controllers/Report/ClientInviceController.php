<?php

namespace App\Http\Controllers\Report;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use PDF;

class ClientInviceController extends Controller
{
    public function clint($id)
    {
        $title = "فاتورة العميل :";
        $pro = CardProData::where('card_data_id', $id)->get();
        $card = CardData::where('id', $id)->first();

        $pdf = PDF::loadView('report.ClintInvce', compact('title', 'pro', 'card'));
        return $pdf->stream('sellersInvce-' . $id . '-.pdf');
    }
}
