<?php

namespace App\Http\Livewire\OrderNum;

use App\CardProData;
use App\Model\CardData;
use Livewire\Component;

class ClintOrderNum extends Component
{
    public $title = "فؤاتير  العملاء";
    public $CardDeliverInfo = true;
    public $ClintData;
    public $NotReDetils;
    public $ProData;
    public $ClintIviceId;

    public function render()
    {
        $deliver = CardData::where('admin_stutus', 1)->get();

        return view('livewire.order-num.clint-order-num'
            , compact('deliver', $this->ClintData, $this->NotReDetils, $this->ProData))
            ->extends('admin.index')
            ->section('content');
    }
    public function DeliverOrderDetiles($id)
    {
        $this->title = "تفاصيل طلب رقم : " . $id;
        $this->ProData = CardProData::where('card_data_id', $id)->get();
        $this->NotReDetils = CardProData::where('card_data_id', $id)->first();
        $this->ClintData = CardData::where('id', $id)->first();
        $this->CardDeliverInfo = false;
        $this->ClintIviceId = $id;
    }
    public function BackOrderNotReady()
    {
        $this->CardDeliverInfo = false;
    }
}
