<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\Produact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CardControllerApi extends Controller
{

    public function card(Request $req)
    {

        $id = Auth::id();
        $order = CardData::where('clint_id', $id)->where('stutus', null)->count();

        if ($order == 0) {
            $c = new CardData;
            $c->clint_id = $id;
            $c->order_num = 1;
            $c->save();

        } else {
            $cardDataId = CardData::where('clint_id', $id)->where('stutus', null)->value('id');
            $order_num = CardData::where('clint_id', $id)->where('stutus', null)->value('order_num');
            $c = CardData::find($cardDataId);
            $c->order_num = $order_num + 1;
            $c->save();

        }

        $seller_id = Produact::where('id', $req->produact_id)->value('user_id');
        $price = Produact::where('id', $req->produact_id)->value('price');
        $total = $req->quantity * $price;

        $cardDataID = CardData::where('clint_id', $id)->where('stutus', null)->value('id');

        $card = CardProData::create([
            'card_data_id' => $cardDataID, // not Requset
            'produact_id' => $req->produact_id,
            'seller_id' => $seller_id, // not Requset
            'quantity' => $req->quantity,
            'price' => $price, // not Requset
            'total' => $total, // not Requset
        ]);
        $order_num = CardData::where('clint_id', $id)->where('stutus', null)->value('order_num');

        return response()->json([
            'stutus' => 'true',
            'data' => $card,
            'order_num' => $order_num,
        ], 200, );
    }

    public function showCard()
    {
        $cardID = CardData::where('clint_id', Auth::id())->where('stutus', null)->value('id');
        return CardProData::where('card_data_id', $cardID)->get();
    }
    public function cardconfirm(Request $req)
    {
        $value = Auth::id() . time();
        $QRCode = Hash::make($value);

        $id = CardData::where('clint_id', Auth::id())->where('stutus', null)->value('id');
        //     $card = CardData::find($id);
        //    city_id = $req->city_id;
        //    area_id = $req->area_id;
        //    near_flg = $req->near_flg;
        //    qr_code = $QRCode;
        //    stutus = 1; //  تم تأكيد الطلب
        //    save();

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
            delete();
        }

        return response()->json([
            'stutus' => 'ture',
            'message' => 'Order Canceled',
        ], 200);

    }

}
