<?php

namespace App\Http\Livewire\OrderNum;

use App\CardProData;
use App\Model\CardData;
use Livewire\Component;

class DeliverOrderNum extends Component
{
    public $title = "فؤاتير مناديب التوصيل";
    public $CardDeliverInfo = true;
    public $ClintData;
    public $NotReDetils;

    public function render()
    {
        $deliver = CardData::where('deliver_id', '!=', null)->get();
//        return view('livewire.order-num.clint-order-num'

        return view('livewire.order-num.deliver-order-num'
            , compact('deliver', $this->ClintData, $this->NotReDetils))
            ->extends('admin.index')
            ->section('content');
    }
    public function DeliverOrderDetiles($id)
    {
        $this->title = "تفاصيل طلب رقم : " . $id;
        $this->NotReDetils = CardProData::where('card_data_id', $id)->first();
        $this->ClintData = CardData::where('id', $id)->first();
        $this->CardDeliverInfo = false;

    }
    public function BackOrderNotReady()
    {
        $this->CardDeliverInfo = false;
    }

}
