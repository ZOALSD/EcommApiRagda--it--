<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\CardData;
use Illuminate\Support\Facades\Auth;

class OrderStutusController extends Controller
{

    public function stutus()
    {

        $order = CardData::where('clint_id', Auth::id())->where('deliver_stutus', '!=', 1)->first();

        if ($order->order_stutus == 0) {
            $st = 'الطلب قيد التوصيل';
        } else {
            $st = 'الطلب قيد التحضير';

        }

        return response()->json($st, 200);

    }

}
