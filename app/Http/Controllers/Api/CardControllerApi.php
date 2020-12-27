<?php

namespace App\Http\Controllers\Api;

use App\Card;
use App\Http\Controllers\Controller;
use App\Model\Produact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CardControllerApi extends Controller
{

    public function card(Request $req)
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
        'stutus',
         */

        $PID = Card::max('process_id');
        if ($PID == null) {
            $process_id = 1;
        } else {
            $process_id = $PID + 1;
        }

        $seller_id = Produact::where('id', $req->produact_id)->value('user_id');
        $price = Produact::where('id', $req->produact_id)->value('price');
        $total = $req->quantity * $price;

        $card = new Card;
        $card->produact_id = $req->produact_id;
        $card->seller_id = $seller_id; // not Requset
        $card->clint_id = Auth::id(); // not Requset
        $card->process_id = $process_id; // not Requset
        $card->quantity = $req->quantity;
        $card->price = $price;
        $card->total = $total; // not Requset
        // $card->stutus = 2; // طلب فقط لم ياكد
        $card->save();

        return response()->json([
            'stutus' => 'true',
            'data' => $card,
        ], 200, );
    }

    public function showCard()
    {
        Card::where('clint_id', Auth::id())->where('stutus', 2)->get();
    }
    public function cardconfirm(Request $req)
    {
        $value = Auth::id() . time();
        $QRCode = Hash::make($value);
        foreach ($req->ids as $id) {

            $card = Card::find($id);
            $card->city_id = $req->city_id;
            $card->area_id = $req->area_id;
            $card->near_flg = $req->near_flg;
            $card->qr_code = $QRCode;
            $card->stutus = 1; //  تم تأكيد الطلب
            $card->save();
        }

        return response()->json([
            'stutus' => 'true',
            'message' => 'Order Confirmed',
        ], 200);

    }

    public function cardcancle(Request $req)
    {
        $value = Auth::id() . time();
        $QRCode = Hash::make($value);
        foreach ($req->ids as $id) {

            $card = Card::find($id);
            $card->delete();
        }

        return response()->json([
            'stutus' => 'ture',
            'message' => 'Order Canceled',
        ], 200);

    }

}
