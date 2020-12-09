<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRCodeOrder extends Model
{
    protected $table = 'q_r_code_orders';
 
    protected $fillable = [
        "client_id",
        "seller_id",
        "delivery_id",
        "card_process_id",
        "qrcode",
        "stusts"
    ];
    
}