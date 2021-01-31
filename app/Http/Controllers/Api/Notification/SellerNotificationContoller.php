<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;
use Illuminate\Support\Facades\Auth;

class SellerNotificationContoller extends Controller
{
    public function notify()
    {

        $notiy = SellerOrder::where(['seller_id' => Auth::id(), 'stutus_seller' => null])->count();
        if ($notiy == null) {
            return 0;
        } else {
            return $notiy;
        }

    }
}
