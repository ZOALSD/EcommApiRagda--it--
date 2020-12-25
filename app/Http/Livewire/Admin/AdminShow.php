<?php

namespace App\Http\Livewire\Admin;

use App\Admin;
use Livewire\Component;

class AdminShow extends Component
{
    public $admins;
    public $role_select = "Ahmed";
    public $add;
    public $i;

    public function render()
    {
        $this->admins = Admin::where('id', 1)->get();
        return view('livewire.admin.admin-show');
    }

    public function deleteAdmin($id)
    {
        $record = Admin::where('id', $id)->delete();

    }

}
