<?php

namespace App\Model;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_has_permissions';

    public $timestamps = false;

    public function permission()
    {
        return $this->hasMany(Permission::class,'id','permission_id');
    }
}