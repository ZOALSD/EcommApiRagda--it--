<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CardData extends Model
{
    protected $fillable = [
        'clint_id',
        'area_id',
        'village_id',
        'near_flg',
        'order_num',
        'deliver_id',
        'qr_code',
        'stutus',
    ];

    public function clint()
    {
        return $this->belongsTo('App\User', 'clint_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Model\Area', 'area_id');
    }

    public function village()
    {
        return $this->belongsTo('App\Model\Village', 'village_id');
    }

    protected $hidden = [
        'updated_at', 'created_at',
    ];
}
