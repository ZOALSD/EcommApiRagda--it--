<?php

namespace App\Http\Controllers\Api;

use App\CardProData;
use App\Http\Controllers\Controller;
use App\Model\CardData;
use Illuminate\Support\Facades\Auth;

class ShowClintOrder extends Controller
{

    public function OrderWaitAccept()
    {
        $wait = CardData::where([
            'clint_id' => Auth::id(),
            'admin_stutus' => null,
            'clint_stutus' => 1,
        ])->count();

        if ($wait != 0) {
            $data = CardData::where([
                'clint_id' => Auth::id(),
                // 'admin_stutus' => null,
                'clint_stutus' => 1,
            ])->with('deliver')->get();

            return response()->json([
                'stutus' => true,
                'message' => 'Welcome Lady Well Respons Soon',
                'data' => $data], 200);

        } else {
            return response()->json([
                'stutus' => false,
                'message' => 'You Don\'t have Now Order',
                'data' => null,
            ], 200);
        }

    }
    public function OrderDeliverd()
    {
        $wait = CardData::where([
            'clint_id' => Auth::id(),
            'admin_stutus' => 1,
            'clint_stutus' => 1,
            'order_stutus' => 1,
        ])->count();

        if ($wait != 0) {
            $data = CardData::where([
                'clint_id' => Auth::id(),
                'admin_stutus' => null,
                'clint_stutus' => 1,
                'order_stutus' => 1,
            ])->with('deliver')->get();

            return response()->json([
                'stutus' => true,
                'message' => 'Welcome Lady wait Your New Order ',
                'data' => $data], 200);

        } else {
            return response()->json([
                'stutus' => false,
                'message' => 'You Don\'t have Now Order',
                'data' => null,
            ], 200);
        }
    }

    public function ClintProData($id)
    {
        $data = CardProData::where('card_data_id', $id)->with('produact')->get();
        return response()->json($data, 200);
    }

    public function ClintProTitelCanceled()
    {
        $id = Auth::id();
        return CardData::where('clint_id', $id)->where('clint_stutus', 0)->get();

    }
}
