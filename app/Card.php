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
        'city_id',
        'area_id',
        'near_flg',
        'quantity',
        'price',
        'total',
        'stutus',

    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];
}
