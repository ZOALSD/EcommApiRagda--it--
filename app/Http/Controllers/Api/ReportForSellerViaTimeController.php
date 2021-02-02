<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Carbon;

class ReportForSellerViaTimeController extends Controller
{
    public function ViaDay()
    {
        $Day = SellerOrder::where('create_at', Carbon::today())->get();

        return response()->json($Day, 200);
    }

    public function ViaWeek()
    {
        $now = Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d H:i');
        $end = $now->endOfWeek()->format('Y-m-d H:i');

        $Weeky = SellerOrder::whereBetween('create_at', array($start, $end))->get();

        return response()->json($Weeky, 200);
    } //Carbon::now()->format('m');

    public function ViaMonth()
    {
        $month = Carbon::now()->format('Y-m');

        $Weeky = SellerOrder::where('create_at', $month)->get();

        return response()->json($Weeky, 200);
    } //Carbon::now()->format('m');

}
