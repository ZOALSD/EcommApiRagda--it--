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
    
    public function removeAdmin(){
        $this->add = "Hello From Function";
        $record = Admin::where('id', 2)->delete();

    }
    
    public function render()
    {
        $this->admins = Admin::get();
        return view('livewire.admin.admin-show');
    }

    
    public function destroy($i)
    {
        if ($i) {
            $record = Admin::where('id', $i);
            $record->delete();
        }
    }
  
}