<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\User;
use PDF;

class ClintController extends Controller
{
    public function clint()
    {
        $clint = User::where('type', 1)->get();
        $title = "قائمة العملاء";
        $pdf = PDF::loadView('report.clint', \compact('clint', 'title'));
        return $pdf->stream('clints.pdf');

    }

    public function seller()
    {
        $clint = User::where('type', 2)->get();
        $title = "قائمة التُجار";
        $pdf = PDF::loadView('report.clint', \compact('clint', 'title'));
        return $pdf->stream('sellers.pdf');

    }

    public function deliver()
    {
        $clint = User::where('type', 3)->get();
        $title = "قائمة مناديب التوصيل";
        $pdf = PDF::loadView('report.clint', \compact('clint', 'title'));
        return $pdf->stream('delivers.pdf');

    }
}
