<?php

namespace App\Http\Livewire\OrderNum;

use App\CardProData;
use App\Model\Area;
use App\Model\CardData;
use App\Model\SellerOrder;
use App\Model\Village;
use App\User;
use Livewire\Component;

class SellerOrderNum extends Component
{
    public $title = "فؤاتير التُجـار";
    public $CardPro;
    public $TitleInvoce = true;
    public $invoceSeller;
    public $village;
    public $AreaVar = null;
    public $VillageVar;
    public $Stutus;
    public $ClintVar;
    public $Clint;
    public $IdInvce;
    public $Seller;
    public $CardInfo;

    public function render()
    {
        $InvrceSeler = SellerOrder::where('stutus_admin', 1)->orderBy('id', 'desc')->get();
        $area = Area::get();
        $this->village = Village::where('area_id', $this->AreaVar)->get();
        $this->Clint = User::where('type', 2)->get();
        return view('livewire.order-num.seller-order-num'
            , compact('InvrceSeler', 'area',
                $this->village,
                $this->CardPro,
                $this->invoceSeller,
                $this->CardInfo,
                $this->Clint))
            ->extends('admin.index')
            ->section('content');
    }

    public function InvoceDetiles($id)
    {
        $this->IdInvce = $id;

        $invoce = SellerOrder::where('id', $id)->first();
        $this->invoceSeller = $invoce;
        $this->CardPro = CardProData::where(['card_data_id' => $invoce->card_cata_id, 'seller_id' => $invoce->seller_id])->get();
        $this->CardInfo = CardData::where('id', $invoce->card_cata_id)->first();
        $this->TitleInvoce = false;

    }
}
