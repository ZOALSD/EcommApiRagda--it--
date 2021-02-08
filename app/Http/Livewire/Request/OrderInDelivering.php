<?php

namespace App\Http\Livewire\Request;

use App\CardProData;
use App\Model\CardData;
use Livewire\Component;
use Livewire\WithPagination;

class OrderInDelivering extends Component
{
    use WithPagination;

    public $title = "الطلبات قـيد التوصيـل";
    public $DetlisOrder;
    public $ClintDataa;
    public $Detils = false;

    public function render()
    {

        $ClintData = $this->ClintDataa;
        $NotReDetils = $this->DetlisOrder;
        $NotReady = CardData::where('order_stutus', 0)->paginate(9);

        return view('livewire.request.order-in-delivering'
            , compact('NotReady', 'NotReDetils', 'ClintData'))
            ->extends('admin.index')
            ->section('content');
    }

    public function OrderInderDeliveringDetlis($id)
    {
        $this->title = "تفاصيل طلب رقم : " . $id;
        $this->DetlisOrder = CardProData::where('card_data_id', $id)->first();
        $this->ClintDataa = CardData::where('id', $id)->first();
        $this->Detils = true;

    }
    public function BackOrderNotReady()
    {
        $this->Detils = true;
    }
}
