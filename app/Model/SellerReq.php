<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerReq extends Model
{
    protected $fillable = [
        'seller_id',
        'card_info_id',
        'card_req_id',
        'stuts',
        'qr_code',

    ];
}
