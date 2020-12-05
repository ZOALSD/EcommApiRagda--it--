<?php

namespace App\Http\Livewire\Admin;


use App\Admin;
use Spatie\Permission\Models\Role;

use Livewire\Component;

class AdminShow extends Component
{
    public $admins ;
    public $role_select = "Ahmed";
    public $add ;
    public $i;
    
  
    
    public function render()
    {
        $this->admins = Admin::get();
        return view('livewire.admin.admin-show');
    }

    public function deleteAdmin($id){
        $record = Admin::where('id',$id)->delete();

    }
    
   
  
}