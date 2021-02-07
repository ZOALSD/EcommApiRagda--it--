<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Ireshif extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'ireshifs';
    protected $fillable = [
        'id',
        'admin_id',
        'seller_order_id',
        'seller_order_id',
        'invoce_image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function seller_order_id()
    {
        return $this->hasOne(\App\Model\SellerOrder::class, 'id', 'seller_order_id');
    }

}
