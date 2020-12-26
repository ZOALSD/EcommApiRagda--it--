<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $table = 'colors';
    protected $fillable = [
        'id',
        'admin_id',
        'name',
        'created_at',
        'updated_at',
    ];

}
