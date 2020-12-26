<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    protected $table = 'sizes';
    protected $fillable = [
        'id',
        'admin_id',
        'size_name',
        'created_at',
        'updated_at',
    ];
    protected $hidden = ['admin_id', 'created_at', 'updated_at'];

}
