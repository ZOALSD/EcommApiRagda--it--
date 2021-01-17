<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Produact;

class PuseProduactController extends Controller
{

    public function puse($id)
    {
        $up = Produact::find($id);
        $up->stutus = 0;
        $up->save();
        return response()->json('Product Puesed');
    }
    //show produact Pused==
    public function ProEcommPused()
    {
        $id = auth()->user()->id;
        return $Produact = Produact::where('stutus', 0)->where('user_id', $id)->get();
    }
    public function Unpuse($id)
    {
        $up = Produact::find($id);
        $up->stutus = 1;
        $up->save();
        return response()->json('Product Puesed');

    }

}
