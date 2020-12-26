<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    protected $table = 'ads';
    protected $fillable = [
        'id',
        'admin_id',
        'ad_image',
        'created_at',
        'updated_at',
    ];

    protected $hidden = ['admin_id', 'created_at', 'updated_at'];

}
