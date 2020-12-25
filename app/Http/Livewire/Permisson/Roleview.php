<?php

namespace App\Http\Livewire\Permisson;

use App\Model\RolePermission;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roleview extends Component
{

    public $role;
    public $permission;
    // public $PermissionRole ;
    public $test;
    public $ids = 1;
    public $bgSeleted; //= Role::select('name')->where('id',$this->ids) ;
    public $bColorSelect;
    public $add = true;
    public $addNew = false;
    public $EditRoleShow = false;
    public $newRoleValue;
    public $namePer;

    public $EidtRoleId;

    public function render()
    {
        $this->bgSeleted = Role::where('id', $this->ids)->value('name');

        $this->role = Role::where('id', '!=', 2)->get();
        $this->permission = Permission::get();

        $PermissionRole = RolePermission::with('permission')->where('role_id', $this->ids)->get();

        return view('livewire.permisson.roleview', \compact('PermissionRole'));
    }

    public function roleSelect($id)
    {

        $this->ids = $id;
    }

    public function addRole()
    { //

        $this->add = false;
        $this->addNew = true; //

    }

    public function editRole($id)
    {

        $this->EidtRoleId = $id;
        $this->add = false;
        $this->EditRoleShow = true;
        $this->newRoleValue = Role::where('id', $id)->value('name');

    }

    public function editRoleValue()
    {
        $this->add = true;
        $this->EditRoleShow = false;
        $role = Role::find($this->EidtRoleId);
        $role->name = $this->newRoleValue;
        $role->save();
    }

    public function saveRole()
    {
        $this->add = true;
        $this->addNew = false;
        $role = new Role;
        $role->guard_name = 'admin';
        $role->name = $this->newRoleValue;
        $role->save();

    }

    public function removePermission($id)
    {

        $n = $this->bgSeleted;
        $role_id = Role::where('name', $n)->value('id');
        RolePermission::where('role_id', $role_id)->where('permission_id', $id)->delete();
        //$role->revokePermissionTo($name);
        session()->flash('deleted', ' تـم   الحـــذف  بنجــاح');

    }

    public function addPermission($id)
    {

        $n = $this->bgSeleted;
        $role_id = Role::where('name', $n)->value('id');
        // RolePermission::where('role_id',$role_id)->where('permission_id',$id)->delete();
        $co = RolePermission::where('role_id', $role_id)->where('permission_id', $id)->count();

        if ($co == 0) {
            $RP = new RolePermission;
            $RP->role_id = $role_id;
            $RP->permission_id = $id;
            $RP->save();
            session()->flash('new', ' تـم  الاضافة بنجــاح');

        } else {
            session()->flash('old', ' تـم  الاضافة مسباقاَ');
        }
    }
}
