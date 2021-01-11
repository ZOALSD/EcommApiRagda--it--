<?php

namespace App\Http\Livewire\OrderNum;

use App\CardProData;
use App\Model\SellerOrder;
use Livewire\Component;

class SellerOrderNum extends Component
{
    public $title = "فؤاتير التُجـار";
    public $CardPro;
    public $TitleInvoce = true;
    public $invoceSeller;

    public function render()
    {
        $InvrceSeler = SellerOrder::where('stutus_admin', 1)->get();

        return view('livewire.order-num.seller-order-num'
            , compact('InvrceSeler', $this->CardPro, $this->invoceSeller))
            ->extends('admin.index')
            ->section('content');
    }

    public function InvoceDetiles($id)
    {

        $invoce = SellerOrder::where('id', $id)->first();
        $this->invoceSeller = $invoce;
        $this->CardPro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();
        $this->TitleInvoce = false;

    }
}
