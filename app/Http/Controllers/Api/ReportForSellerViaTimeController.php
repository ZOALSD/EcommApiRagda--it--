<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Carbon;

class ReportForSellerViaTimeController extends Controller
{
    public function ViaDay()
    {
        // $Day = SellerOrder::where('created_at', Carbon::today())->get();
        //  $Day = SellerOrder::get(); //where('created_at', Carbon::today())->get();
        $Day = SellerOrder::where('seller_id', Auth::id())
            ->whereDay('created_at', now()->day)->get();
        return response()->json($Day, 200);
    }

    public function ViaWeek()
    {
        $now = Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d H:i');
        $end = $now->endOfWeek()->format('Y-m-d H:i');

        $Weeky = SellerOrder::whereBetween('created_at', array($start, $end))->get();

        return response()->json($Weeky, 200);
    } //Carbon::now()->format('m');

    public function ViaMonth()
    {
        $month = Carbon::now()->format('Y-m');

        $Weeky = SellerOrder::where('created_at', $month)->get();

        return response()->json($Weeky, 200);
    } //Carbon::now()->format('m');

}
