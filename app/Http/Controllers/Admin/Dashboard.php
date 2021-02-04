<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\SellerOrder;
use Illuminate\Support\Carbon;

class Dashboard extends Controller
{

    public function home()
    {

        $now = Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d');
        $end = $now->endOfWeek()->format('Y-m-d');
        return ['Start' => $start, 'End' => $end];
        SellerOrder::where('datee', '>=', $start)->where('datee', '<=', $end);
        $Weeky = SellerOrder::whereBetween('datee', array($start, $end))->get()->dump();

        return $Weeky;

        $data = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->first();
        return $data->id;
        return view('admin.home');

    }

    // public function theme($id) {
    //     if (session()->has('theme')) {
    //         session()->forget('theme');
    //     }
    //     session()->put('theme', $id);
    // }
}
