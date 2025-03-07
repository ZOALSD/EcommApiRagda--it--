<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [

        'produact_id',
        'seller_id',
        'clint_id',
        'process_id',
        'area_id',
        'village_id',
        'near_flg',
        'quantity',
        'price',
        'total',
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
