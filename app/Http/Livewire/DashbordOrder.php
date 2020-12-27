<?php

namespace App\Http\Livewire;

use App\Card;
use Livewire\Component;

class DashbordOrder extends Component
{

    public $order = true;
    public $newOrder;
    public $title;
    public $orderData;

    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $Orders = $this->orderData; //= Card::where('stusts', 2)->get();

        return view('livewire.dashbord-order', \compact('orderCount', 'Orders'));
    }

    public function OrdarClose()
    {
        $this->order = true;
    }

    public function NewOrder()
    {
        $this->title = "الطلبات الجديدة";
        $this->order = false;
        $this->orderData = Card::where('stutus', 2)->get();

    }
}
