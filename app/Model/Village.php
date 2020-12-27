<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Village extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'villages';
    protected $fillable = [
        'id',
        'admin_id',
        'area_id',
        'village_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'admin_id',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    public function area_id()
    {
        return $this->hasOne(\App\Model\Area::class, 'id', 'area_id');
    }

}
