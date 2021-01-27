<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardProData extends Model
{
    protected $table = 'card_pro_data'; //
    protected $fillable = [
        'card_data_id',
        'produact_id',
        'seller_id',
        'quantity',
        'price',
        'total',
        'seller_percent',
        'our_percent',
    ];

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    public function produact()
    {
        return $this->belongsTo('App\Model\Produact', 'produact_id');
    }

    public function prod()
    {
        return $this->belongsTo('App\Model\Produact', 'produact_id')->select(['id', 'cate_name']);
    }

    public function ClintReq()
    {
        return $this->belongsTo('App\Model\CardData', 'card_data_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
