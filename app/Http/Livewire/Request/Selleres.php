<?php

namespace App\Http\Livewire\Request;

use App\User;
use Livewire\Component;

class Selleres extends Component
{

    public $title = "قائمة التُـجار";
    public function render()
    {
        $clintsData = User::where('type', 2)->get();
        return view('livewire.request.selleres'
            , compact('clintsData', )) //

            ->layout('admin.live')
            ->slot('body');

    }
}
