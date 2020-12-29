<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliverReq extends Model
{
    protected $fillable = [
        'deliver_id',
        'card_info_id',
        'stuts',
        // null لم يتم الرد
        // 0 جاري التوصيل
        // 1 تم التوصيل
        'qr_code',
    ];

    public function CardInfo()
    {
        return $this->belongsTo('App\Model\CardData', 'card_info_id');
    }
    public function deliver()
    {
        return $this->belongsTo('App\User', 'deliver_id');
    }
}
