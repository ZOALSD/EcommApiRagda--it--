<?php

namespace App\Http\Livewire\Request;

use App\User;
use Livewire\Component;

class Selleres extends Component
{

    public $title = "قائمة التُـجار";
    public $PercentValue;
    public $IdEdit;
    public function render()
    {
        $clintsData = User::where('type', 2)->get();
        return view('livewire.request.selleres'
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

    public function ChangePercent($id)
    {
        if ($this->PercentValue < 101) {
            $Clint = User::where('id', $id)->update(['clint_perce' => $this->PercentValue]);
        }
        $this->IdEdit = 0;

    }

    public function EnblePercentEdit($id)
    {
        $this->IdEdit = $id;
    }
}
