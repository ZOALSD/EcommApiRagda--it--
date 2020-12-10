<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'personal_access_tokens' ;

    protected $fillable = 
    [
        'tokenable_type',
        'tokenable_id',
         'name',
        'token',
        'abilities'
    ];
}