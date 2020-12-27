<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        "client_id",
        "seller_id",
        "delivery_id",
        "card_process_id",
        "qrcode",
        "stusts",
    ];
}
