<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use App\Model\Produact;
use App\Model\SellerOrder;
use App\User;
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
        $pro = Produact::where('id', $req->produact_id)->first();
        $SellerPercent = User::where('id', $pro->user_id)->value('clint_perce');
        $total = $req->quantity * $pro->price;

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
                'price' => $pro->price, // not Requset
                'total' => $total, // not Requset
                'seller_percent' => $total * (100 - $SellerPercent) / 100, // not Requset
                'our_percent' => $total * $SellerPercent / 100, // not Requset
            ]);
            $sellerOrder = SellerOrder::where('card_cata_id', $cardDataID)->where('seller_id', $seller_id)->count();

            if ($sellerOrder == 0) {
                $qrcode = Hash::make($cardDataID . time() . 'ZOOLS3D' . Auth::id());
                SellerOrder::create([
                    'clint_id' => Auth::id(),
                    'card_cata_id' => $cardDataID,
                    'seller_id' => $seller_id,
                    'qrcode' => $qrcode,
                ]);
            }
            $card = CardProData::where('id', $add->id)->with('produact')->first();

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

    public function OrderNum()
    {
        $data = CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->value('order_num');
        return response()->json(['OrderNum' => $data], 200);
    }

    public function showCard()
    {
        $cardID = CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->value('id');
        $car = CardProData::where('card_data_id', $cardID)->with('produact')->get();
        return response()->json($car, 200);
    }

    public function cardconfirm(Request $req)
    {
        if (CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->count() != 0) {
            $value = Auth::id() . time() . "ZOOLS3D";
            $QRCode = Hash::make($value);
            $id = CardData::where('clint_id', Auth::id())->where('clint_stutus', null)->value('id');

            $card = CardData::find($id);
            $card->area_id = $req->area_id;
            $card->village_id = $req->village_id;
            $card->near_flg = $req->near_flg;
            $card->qr_code = $QRCode;
            $card->clint_phone = $req->clint_phone;
            $card->clint_stutus = 1; //   تم تأكيد الطلب
            $card->save();

            $clintOderNum = User::where('id', Auth::id())->value('clint_order_num');

            SellerOrder::where([
                'card_cata_id' => $id,
                'clint_id' => Auth::id(),
                'stutus_clint' => null])
                ->update(['stutus_clint' => 1]);

            if ($clintOderNum == null) {
                User::where('id', Auth::id())->update(['clint_order_num' => 1]);
            } else {
                User::where('id', Auth::id())->update(['clint_order_num' => $clintOderNum + 1]);
            }
            return response()->json([
                'stutus' => 'true',
                'message' => 'Order Confirmed',
            ], 200);
        } else {
            return response()->json([
                'stutus' => false,
                'message' => 'Your Don\'t Have Order To Comfirm -^-',
            ], 200);
        }

    }

    public function EditProCard(Request $req, $id)
    {
        $data = CardProData::find($id)->update([
            'quantity' => $req->quantity,
        ]);
        return response()->json([
            'stutus' => 'true',
            'message' => 'Order Updated',
        ], 200);
    }

    public function DeleteProCard($id)
    {
        $data = CardProData::where('id', $id)->count();
        if ($data !== 0) {
            $data = CardProData::find($id)->delete();
            return response()->json([
                'stutus' => true,
                'message' => 'Order Delete',
            ], 200);
        } else {
            return response()->json([
                'stutus' => false,
                'message' => 'Order Not Found -^-',
            ], 200);
        }
    }

    public function cardcancle()
    {
        CardData::where(['clint_id' => Auth::id(), 'clint_stutus' => null])
            ->update(['clint_stutus' => 0]);

        return response()->json([
            'stutus' => 'ture',
            'message' => 'Order Canceled',
        ], 200);

    }

}
