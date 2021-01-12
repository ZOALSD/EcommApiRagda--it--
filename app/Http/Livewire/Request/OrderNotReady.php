<?php

namespace App\Http\Livewire\Request;

use App\CardProData;
use App\Model\CardData;
use Livewire\Component;
use Livewire\WithPagination;

class OrderNotReady extends Component
{
    use WithPagination;

    public $title = "الطلبات قـيد التحضـير";
    public $DetlisOrder;
    public $ClintDataa;
    public $Detils = false;

    public function render()
    {
        $ClintData = $this->ClintDataa;
        $NotReDetils = $this->DetlisOrder;
        $NotReady = CardData::where(['admin_stutus' => 1, 'deliver_stutus' => null])->paginate(9);
        return view('livewire.request.order-not-ready'
            , compact('NotReady', 'NotReDetils', 'ClintData'))
            ->extends('admin.index')
            ->section('content');
    }

    public function OrderNotReadyDetlis($id)
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
