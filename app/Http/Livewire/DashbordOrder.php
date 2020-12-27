<?php

namespace App\Http\Livewire;

use App\Card;
use Livewire\Component;

class DashbordOrder extends Component
{

    public $order = true;
    public $newOrder;
    public $title;
    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $orderData = 8; //QRCodeOrder::where('stusts',0)->get();

        return view('livewire.dashbord-order', \compact('orderCount'));
    }

    public function OrdarClose()
    {
        $this->order = true;
    }

    public function NewOrder()
    {
        $this->title = "الطلبات الجديدة";
        $this->order = false;
        $this->NewOrder = Card::where('stutus', 1)->get();

    }
}
