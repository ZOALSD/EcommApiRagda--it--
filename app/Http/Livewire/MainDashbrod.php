<?php

namespace App\Http\Livewire;

use App\Model\CardData;
use Livewire\Component;

class MainDashbrod extends Component
{
    public $orderCount;
    public $NewReqOrderVar = false;

    public function render()
    {
        $this->orderCount = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->count();

        return view('livewire.main-dashbrod');
    }

    public function NewReqOrder()
    {
        $this->NewReqOrderVar = true;
    }
}
