<?php

namespace App\Http\Livewire;

use App\Model\CardData;
use App\Model\SellerOrder;
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
    public $SellerMonyCount;
    public $ClintMonyCount;

    public function render()
    {
        $this->ClintCount = User::where('type', 1)->count();
        $this->SellerCount = User::where('type', 2)->count();
        $this->DeliveryCount = User::where('type', 3)->count();

        $this->InderDeliverCount = CardData::where('order_stutus', 0)->count();
        $this->SuccessflluCount = CardData::where('order_stutus', 1)->count();
        $this->NotReadyCount = CardData::where(['admin_stutus' => 1, 'order_stutus' => null])->count();

        $this->orderCount = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->count();
        $this->SellerMonyCount = SellerOrder::where('stutus_admin', 1)->count();
        $this->ClintMonyCount = CardData::where(['clint_stutus' => 1, 'admin_stutus' => 1])->count();

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

    public function Clints()
    {
        return redirect()->route('Clints');

    }

    public function Sellers()
    {
        return redirect()->route('Sellers');

    }

    public function Deliveres()
    {
        return redirect()->route('Deliveres');

    }

    public function deliverOrderNum()
    {
        return redirect()->route('deliverOrdeNum');

    }

    public function clinteOrderNum()
    {
        return redirect()->route('clinteOrderNum');

    }

    public function InvoceSeller()
    {
        return redirect()->route('InvoceSeller');

    }

}
