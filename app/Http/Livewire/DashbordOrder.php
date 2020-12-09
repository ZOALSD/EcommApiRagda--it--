<?php

namespace App\Http\Livewire;

use App\QRCodeOrder;
use Livewire\Component;

class DashbordOrder extends Component
{
    public function render()
    {
        $orderCount = QRCodeOrder::where('stusts',0)->count();
        $orderData  = QRCodeOrder::where('stusts',0)->get();

        return view('livewire.dashbord-order',\compact('orderCount'));
    }


    public function NewOrder(){

        

    }
}