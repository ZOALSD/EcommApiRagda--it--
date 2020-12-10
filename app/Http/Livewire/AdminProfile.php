<?php

namespace App\Http\Livewire;

use Auth;
use App\Admin;
use Livewire\Component;

class AdminProfile extends Component
{
    public $name;
    public $EditName = false ;
    public function render()
    {
         $user = admin()->user();
        return view('livewire.admin-profile',compact('user'));
    }

    public function changeAdminName($id){
        
        Admin::where('id',$id)->update(['name'=>$this->name]);
        $this->EditName = false ;


    }

    public function showEdtingName(){
        $this->EditName = true ;
    }
}