<?php

namespace App\Model;

use App\Model\SellerOrder;
use Illuminate\Database\Eloquent\Model;

class SellerOrder extends Model
{

    protected $table = 'seller_orders';

    protected $fillable = [
        'card_cata_id',
        'clint_id',
        'seller_id',
        'deliver_id',
        'qrcode',
        'datee',
        'houre',
        'stutus_clint',
        'stutus_seller',
        'stutus_admin',
    ];

    // public function card()
    // {
    //     return $this->belongsTo('App\Model\CardData', 'card_cata_id'); //->select(['id', 'area_id', 'created_at']);
    // }

    public function sell()
    {
        return $this->belongsTo('App\User', 'seller_id')->select(['id', 'name']);
    }
    public function deli()
    {
        return $this->belongsTo('App\User', 'deliver_id')->select(['id', 'name']);
    }

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id')->select(['id', 'name', 'phone', 'area_id']);
    }
    public function deliver()
    {
        return $this->belongsTo('App\User', 'deliver_id')->select(['id', 'name', 'phone']);
    }

    public function clint()
    {
        return $this->belongsTo('App\User', 'clint_id')->select(['id', 'name', 'phone']);
    }

    protected $hidden = ['stutus_admin', 'clint_id', 'seller_id', 'stutus_clint', 'stutus_seller', 'updated_at', 'created_at'];
}
