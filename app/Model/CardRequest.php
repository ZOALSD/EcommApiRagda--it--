<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CardRequest extends Model
{
    protected $fillable = [
        'card_data_id',
        'produact_id',
        'seller_id',
        'quantity',
        'price',
        'total',
    ];

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    public function produact()
    {
        return $this->belongsTo('App\Model\Produact', 'produact_id');
    }
}
