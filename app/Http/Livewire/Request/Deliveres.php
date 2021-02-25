<?php

namespace App\Http\Livewire\Request;

use App\User;
use Livewire\Component;

class Deliveres extends Component
{

    public $title = "قائمة مناديب الؤصـيل";
    public $MaxValue;
    public $Edit;

    public function render()
    {
        $clintsData = User::where('type', 3)->get();
        return view('livewire.request.deliveres'
            , compact('clintsData'))
            ->layout('admin.live')
            ->slot('body');

    }
    public function ActiveClint($id)
    {
        User::where('id', $id)->update(['stuts' => 0]);
    }

    public function DisActiveClint($id)
    {
        User::where('id', $id)->update(['stuts' => 1]);
    }
    public function ChangeMax($id)
    {
        if (!$this->MaxValue == null) {
            User::where('id', $id)->update(['max_value' => $this->MaxValue]);
        }

        $this->Edit = 0;
    }
    public function SellerPdf()
    {
        return redirect('SellerPdf');
    }

    public function EnbleEditMax($id)
    {
        $this->Edit = $id;
    }

}
