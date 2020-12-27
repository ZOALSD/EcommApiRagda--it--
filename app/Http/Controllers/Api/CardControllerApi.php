<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class CardControllerApi extends Controller
{

    public function store(Request $req)
    {

        /*'produact_id',
        'seller_id',
        'clint_id',
        'process_id',
        'city_id',
        'area_id',
        'near_flg',
        'quantity',
        'price',
        'total',
        'stutus', */

        $card = new Card;
        $card->produact_id = $req->produact_id;
        $card->seller_id = $req->seller_id;
        $card->seller_id = $req->seller_id;

    }

}
