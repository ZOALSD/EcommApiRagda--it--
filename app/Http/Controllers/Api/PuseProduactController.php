<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PuseProduactController extends Controller
{
    
    public function puse($id){

        $up =Produact::find($id) ;
        $up->stutus = 0 ;
        $up->save();

        return response()->json('Product Puesed');

        
    }


    public function Unpuse($id){

        $up =Produact::find($id) ;
        $up->stutus = 1 ;
        $up->save();

        return response()->json('Product Puesed');

        
    }

}