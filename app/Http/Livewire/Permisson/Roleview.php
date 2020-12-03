<?php

namespace App\Http\Livewire\Permisson;

use DB;

use Livewire\Component;
use App\Model\RolePermission;
use Spatie\Permission\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Permission;

class Roleview extends Component
{

    public $role;
    public $permission;
   // public $PermissionRole ;
    public $test;
    public $ids = 1; 
    public $bgSeleted ;//= Role::select('name')->where('id',$this->ids) ;
    public $bColorSelect;
    public $add = true;
    public $addNew = false;
    public $EditRoleShow =false;
    public $newRoleValue;
    public $namePer;

    public $EidtRoleId;

    public function render()
    {
         $this->bgSeleted = Role::where('id',$this->ids)->value('name');

        $this->role = Role::get();
        $this->permission =Permission::get();
        
         $PermissionRole =RolePermission::with('permission')->where('role_id',$this->ids)->get();
         
         return view('livewire.permisson.roleview',\compact('PermissionRole'));
    }

    public function roleSelect($id){
            
        $this->ids = $id;
    }

    public function addRole(){//

        $this->add =false;
        $this->addNew =true;//

    }

    public function editRole($id){

        $this->EidtRoleId = $id;
        $this->add =false;
        $this->EditRoleShow = true;
        $this->newRoleValue = Role::where('id',$id)->value('name');

    }

    public function editRoleValue(){
        $this->add =true;
        $this->EditRoleShow = false;
        $role = Role::find($this->EidtRoleId);
        $role->name = $this->newRoleValue;
        $role->save();
    }

    public function saveRole(){
        $this->add =true;
        $this->addNew =false;//
        $role =new Role;
        $role->name = $this->newRoleValue;
        $role->save();
        
    }

    public function removePermission($name){
        
     
        $n = $this->bgSeleted;
        $role= Role::where('name',$n)->vlaue('id');
        $role->revokePermissionTo($name);

    }
}