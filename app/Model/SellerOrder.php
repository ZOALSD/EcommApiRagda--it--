<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerOrder extends Model
{
    protected $table = 'seller_orders';

    protected $fillable = [
        'card_cata_id',
        'seller_id',
        'qrcode',
        'stutus',
    ];

    public function card()
    {
        return $this->belongsTo('App\Model\CardData', 'card_cata_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    protected $hidden = ['created_at', 'updated_at'];
}
