<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashbordOrder extends Component
{
    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $orderData = 8; //QRCodeOrder::where('stusts',0)->get();

        return view('livewire.dashbord-order', \compact('orderCount'));
    }

    public function NewOrder()
    {

    }
}
