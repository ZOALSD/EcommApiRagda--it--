<?php

namespace App\Http\Livewire\Request;

use App\User;
use Livewire\Component;

class Clints extends Component
{
    public $title = "قائمة العملاء";
    public function render()
    {
        $clintsData = User::where('type', 1)->get();
        return view('livewire.request.clints'
            , compact('clintsData'))
            ->layout('admin.live')
            ->slot('body');

    }

}
