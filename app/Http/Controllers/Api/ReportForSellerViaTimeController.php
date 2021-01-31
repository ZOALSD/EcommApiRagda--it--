<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;

class ReportForSellerViaTimeController extends Controller
{
    public function ViaDay()
    {
        return Carbon::today();
        SellerOrder::where('create_at', Carbon::today())->get();
    }
}
