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
    public $clintDataa;
    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $Orders = $this->orderData; //= Card::where('stusts', 2)->get();
        $clintData = $this->clintDataa;
        return view('livewire.dashbord-order', \compact('orderCount', 'Orders', 'clintData'));
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

    public function OrderDetlis($id)
    {
        $this->clintDataa = Card::where('id', $id)->where('stutus', 2)->first();

    }
}
