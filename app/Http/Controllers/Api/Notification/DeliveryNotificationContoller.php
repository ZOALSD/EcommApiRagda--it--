<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;

class DeliveryNotificationContoller extends Controller
{
    public function notify()
    {

        $seller = SellerOrder::where(['deliver_id' => Auth::id(), 'stutus_seller' => 1])->count();
        $card = CardData::where(['deliver_id' => Auth::id(), 'admin_stutus' => 1])
            ->where('order_stutus', '!=', null)->count();

        $notiy = $seller; //+ $card;

        if ($notiy == null) {
            return 0;
        } else {
            return $notiy;
        }

    }
}
