<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use PDF;

class ClintController extends Controller
{
    public function clint()
    {
        $data = [
            'foo' => 'bar',
        ];
        $pdf = PDF::loadView('report.clint', $data);
        return $pdf->stream('document.pdf');
    }
}
