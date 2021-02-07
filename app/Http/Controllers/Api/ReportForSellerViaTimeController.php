<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportForSellerViaTimeController extends Controller
{
    public function ViaDay()
    {
        //houre  '',

        $Day = SellerOrder::select('id', 'seller_id', 'deliver_id')->where('seller_id', Auth::id())
            ->where('datee', date('Y-m-d'))->with(['sell', 'deli'])->get();
        return response()->json($Day, 200);
    }

    public function ViaWeek()
    {
        $now = Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d');
        $end = $now->endOfWeek()->format('Y-m-d');

        $Weeky = SellerOrder::where('seller_id', Auth::id())
            ->where('datee', '>=', $start)->where('datee', '<=', $end)->with(['sell', 'deli'])->get();
        //  ->whereBetween('datee', array($start, $end))->with(['sell', 'deli'])->get();
        return response()->json($Weeky, 200);
    }

    public function ViaMonth()
    {
        $month = SellerOrder::where('seller_id', Auth::id())
            ->whereMonth('created_at', date('m'))->with(['sell', 'deli'])->get();
        return response()->json($month, 200);
    }

}
