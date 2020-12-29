<?php

namespace App\Http\Livewire;

use App\Model\CardData;
use App\Model\CardRequest;
use Livewire\Component;

class DashbordOrder extends Component
{

    public $order = true;
    public $newOrder;
    public $title;
    public $orderData;
    public $clintDataa;
    public $cardRequest;

    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $Orders = $this->orderData; //= Card::where('stusts', 2)->get();
        $clintData = $this->clintDataa;
        $CardReq = $this->cardRequest;
        $delive = User::where('type', 3)->get();
        return view('livewire.dashbord-order', \compact('orderCount', 'Orders', 'clintData', 'CardReq', 'delive'));
    }

    public function OrdarClose()
    {
        $this->order = true;
    }

    public function NewOrder()
    {
        $id = CardData::where('stutus', 0)->first()->value('id');
        $this->title = " : طلب رقم " . $id;
        $this->order = false;
        $this->orderData = CardData::where('stutus', 0)->get();
        $this->clintDataa = CardData::where('stutus', 0)->first();
        $this->cardRequest = CardRequest::where('card_data_id', $id)->get();

    }

    public function OrderDetlis($id)
    {

    }
}
