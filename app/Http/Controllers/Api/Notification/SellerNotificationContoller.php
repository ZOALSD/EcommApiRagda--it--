<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use App\Model\SellerOrder;

class SellerNotificationContoller extends Controller
{
    public function notify()
    {

        return SellerOrder::where(['seller_id' => Auth::id(), 'sututs_seller' => null])->conut();

    }
}
