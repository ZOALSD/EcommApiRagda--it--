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
        //استلام مندوب التوصيل الطلبات اول مرة
        $data = CardData::where(['deliver_id' => Auth::id(), 'admin_stutus' => 1, 'deliver_stutus' => null])->get();
        return response()->json(['stuts' => true, 'Data' => $data], 200);
    }

    public function DeliverOrderDone()
    {
        //الطلبات التي تمت الموفقة عليها ولم يتم استلهماها من التاجر  اا
        //this is Rong Stutus Show Changed After Check

        $data = CardData::where(['deliver_id' => Auth::id(), 'deliver_stutus' => 1])->with('deliver')->get();
        return response()->json(['stuts' => true, 'Data' => $data,
        ], 200);
    }

    public function DeliverOrderDeliveredDone()
    {
        {
            //الطلبات التي تم تسليمهااااااا
            //this is Rong Stutus Show Changed After Check

            $data = CardData::where(['deliver_id' => Auth::id(), 'order_stutus' => 1])->with('deliver')->get();
            return response()->json(['stuts' => true, 'Data' => $data,
            ], 200);
        }
    }

    public function DeliverOrderDetils($id)
    {
        $data = CardProData::where(['card_data_id' => $id])->with('produact')->get();
        return response()->json($data, 200);
    }
}
