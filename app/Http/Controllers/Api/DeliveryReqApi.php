<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use Illuminate\Support\Facades\Auth;

class DeliveryReqApi extends Controller
{
    public function DeliverOrder()
    {
        $data = CardData::where(['deliver_id' => Auth::id(), 'admin_stutus' => 1, 'deliver_stutus' => null])->get();
        return response()->json(['stuts' => true, 'Data' => $data], 200);
    }

    public function DeliverOrderDone()
    {
        //this is Rong Stutus Show Changed After Check
        $data = CardData::where(['deliver_id' => Auth::id(), 'stutus_deliver' => 1])->with('deliver')->get();
        return response()->json(['stuts' => true, 'Data' => $data,
        ], 200);
    }

    public function DeliverOrderDetils($id)
    {
        $data = CardProData::where(['card_data_id' => $id, 'deliver_id' => Auth::id()])->with('produact')->get();
        return response()->json($data, 200);
    }
}
