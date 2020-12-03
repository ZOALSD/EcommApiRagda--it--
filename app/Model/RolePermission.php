<?php

namespace App\Model;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_has_permissions';


    public function permission()
    {
        return $this->hasMany(Permission::class,'id','permission_id');
    }
}