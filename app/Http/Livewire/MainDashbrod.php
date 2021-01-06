<?php

namespace App\Http\Livewire;

use App\Model\CardData;
use App\User;
use Livewire\Component;

class MainDashbrod extends Component
{
    public $orderCount;
    public $NewReqOrderVar = false;
    public $InderDeliverCount;
    public $SuccessflluCount;
    public $NotReadyCount;
    public $ClintCount;
    public $DeliveryCount;
    public $SellerCount;

    public function render()
    {
        $this->ClintCount = User::where('type', 1)->count();
        $this->SellerCount = User::where('type', 2)->count();
        $this->DeliveryCount = User::where('type', 3)->count();

        $this->orderCount = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->count();
        $this->InderDeliverCount = CardData::where('deliver_stutus', 1)->count();
        $this->SuccessflluCount = CardData::where('order_stutus', 1)->count();
        $this->NotReadyCount = CardData::where('admin_stutus', 1)->where('admin_stutus', null)->count();

        return view('livewire.main-dashbrod')
            ->extends('admin.index')
            ->section('content');
    }

    public function NewReqOrder()
    {
        return redirect()->route('Order');
    }

    public function OrderNotReadyy()
    {
        return redirect()->route('OrderNotReadyy');
    }

    public function OrderInderDelivering()
    {
        return redirect()->route('OrderInderDelivering');
    }

    public function OrderSuccessfullyDelivery()
    {
        return redirect()->route('OrderSuccessfullyDelivery');
    }

}
