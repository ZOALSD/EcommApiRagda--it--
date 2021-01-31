<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Produact;

class ProduactTopRequestController extends Controller
{
    public function top()
    {
        $data = Produact::where('request', '!=', null)->orderBy('request', 'desc')->take(15)->get();

        return response()->json($data, 200);
    }
}
