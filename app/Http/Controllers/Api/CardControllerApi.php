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
        $order = CardData::where('clint_id', $id)->where('clint_stutus', null)->count();

        if ($order == 0) {
            $c = new CardData;
            $c->clint_id = $id;
            $c->order_num = 1;
            $c->save();

        } else {
            $cardData = CardData::where('clint_id', $id)->where('clint_stutus', null)->first();
            $c = CardData::find($cardData->id);
            $c->order_num = $cardData->order_num + 1;
            $c->save();

        }

        $seller_id = Produact::where('id', $req->produact_id)->value('user_id');
        $price = Produact::where('id', $req->produact_id)->value('price');
        $total = $req->quantity * $price;

        $cardDataID = CardData::where('clint_id', $id)->where('clint_stutus', null)->value('id');

        $ConutSamePro = CardProData::where('card_data_id', $cardDataID)
            ->where('produact_id', $req->produact_id)
            ->count();
        if ($ConutSamePro == 0) {
            $add = CardProData::create([
                'card_data_id' => $cardDataID, // not Requset
                'produact_id' => $req->produact_id,
                'seller_id' => $seller_id, // not Requset
                'quantity' => $req->quantity,
                'price' => $price, // not Requset
                'total' => $total, // not Requset
            ]);
            $card = CardProData::find($add->id)->with('produact')->first();

        } else {
            $OldPro = CardProData::where('card_data_id', $cardDataID)
                ->where('produact_id', $req->produact_id)->first();

            $Up = CardProData::find($OldPro->id);
            $Up->quantity = $OldPro->quantity + $req->quantity;
            $Up->total = $total;
            $Up->save();

            $card = CardProData::where('id', $Up->id)->with('produact')->first();

            $cardData = CardData::where('clint_id', $id)->where('clint_stutus', null)->first();
            $c = CardData::find($cardData->id);
            $c->order_num = $cardData->order_num - 1;
            $c->save();
        }

        $order_num = CardData::where('clint_id', $id)->where('clint_stutus', null)->value('order_num');

        return response()->json([
            'stutus' => 'true',
            'data' => $card,
            'order_num' => $order_num,
        ], 200, );
    }

    public function showCard()
    {
        $cardID = CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->value('id');

        $car = CardProData::where('card_data_id', $cardID)->with('produact')->first();

        $pro = Produact::select(['cate_name', 'color_name'])->where('id', $cardID->produact_id)->get();

        return response()->json(["card" => $car, "prodact" => $pro], 200);
    }

    public function cardconfirm(Request $req)
    {
        $value = Auth::id() . time();
        $QRCode = Hash::make($value);
        $id = CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->value('id');

        $card = CardData::find($id);
        $card->area_id = $req->area_id;
        $card->village_id = $req->village_id;
        $card->near_flg = $req->near_flg;
        $card->qr_code = $QRCode;
        $card->clint_stutus = 1; //  تم تأكيد الطلب
        $card->save();

        return response()->json([
            'stutus' => 'true',
            'message' => 'Order Confirmed',
        ], 200);

    }

    public function EditProCard(Request $req, $id)
    {

        CardProData::where('id', $id)->update([
            'quantity' => $req->quantity,
        ]);

        return response()->json([
            'stutus' => 'true',
            'message' => 'Order Updated',
        ], 200);
    }

    public function DeleteProCard($id)
    {
        CardProData::find($id)->delete();
        return response()->json([
            'stutus' => 'true',
            'message' => 'Order Delete',
        ], 200);
    }

    public function cardcancle(Request $req)
    {
        // $value = Auth::id() . time();
        $car = CardProData::find($id);
        $car->clint_stutus = 0;
        $car->save();

        return response()->json([
            'stutus' => 'ture',
            'message' => 'Order Canceled',
        ], 200);

    }

    //Clinet PorDuact -----

    public function ClintProTitelDone()
    {
        $id = Auth::id();
        return CardData::where('clint_id', $id)->where('clint_stutus', 1)->get();
    }

    public function ClintProTitelCanceled()
    {
        $id = Auth::id();
        return CardData::where('clint_id', $id)->where('clint_stutus', 0)->get();
    }

    public function ClintProData($id)
    {
        return CardProData::where('card_data_id', $id)->first();
    }

}
