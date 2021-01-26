<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ReportForSeller extends Controller
{
    public function Report()
    {

        $invoce = SellerOrder::where('seller_id', Auth::id())->with(['seller', 'deliver', 'clint'])->get();

        return response()->json($invoce, 200);

    }
}
