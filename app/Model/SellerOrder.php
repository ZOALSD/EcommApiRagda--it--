<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerOrder extends Model
{
    protected $table = 'seller_orders';

    protected $fillable = [
        'card_cata_id',
        'clint_id',
        'seller_id',
        'qrcode',
        'stutus',
    ];

    public function card()
    {
        return $this->belongsTo('App\Model\CardData', 'card_cata_id')->select(['id', 'area_id', 'created_at']);
    }

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    public function clint()
    {
        return $this->belongsTo('App\User', 'clint_id')->select(['id', 'phone', 'name']);
    }
    protected $hidden = ['clint_id', 'seller_id', 'stutus_clint', 'stutus_seller', 'updated_at'];
}
