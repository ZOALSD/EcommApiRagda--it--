<?php

namespace App\Http\Livewire;

use App\CardProData;
use App\Model\Area;
use App\Model\CardData;
use App\Model\CardRequest;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashbordOrder extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $order = true;
    public $newOrder;
    public $title;
    public $orderData;
    public $clintDataa;
    public $cardRequest;
    public $DeliveyTaskShow = false;
    public $delTaskK;
    public $detelis = 0;
    public $DeliveReqDet;
    public $produactDel;
    public $ShowDetliesDeliReqVar = 0;
    public $typeSearch = "الكل";
    public $SearchWord;
    public $AreaModel = null;

    public function render()
    {
        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $Orders = $this->orderData; //= Card::where('stusts', 2)->get();
        $clintData = $this->clintDataa;
        $CardReq = $this->cardRequest;
        $delTask = $this->delTaskK;
        $ReqDelDetlises = $this->DeliveReqDet;
        $produactDeliver = $this->produactDel;

        if ($this->AreaModel != null) {

            if ($this->AreaModel != "all") {
                if ($this->typeSearch == 'الكل') {
                    $delive = User::search($this->SearchWord)->where('area_id', $this->AreaModel)->where('type', 3)->paginate(4);

                } elseif ($this->typeSearch == 'غير مشغولين') {
                    $delive = User::search($this->SearchWord)->where('area_id', $this->AreaModel)->where('stuts_delivery', null)->where('type', 3)->paginate(4);
                } else {
                    $delive = User::search($this->SearchWord)->where('area_id', $this->AreaModel)->where('stuts_delivery', 1)->where('type', 3)->paginate(4);
                }
            } else {
                if ($this->typeSearch == 'الكل') {
                    $delive = User::search($this->SearchWord)->where('type', 3)->paginate(4);

                } elseif ($this->typeSearch == 'غير مشغولين') {
                    $delive = User::search($this->SearchWord)->where('stuts_delivery', null)->where('type', 3)->paginate(4);
                } else {
                    $delive = User::search($this->SearchWord)->where('stuts_delivery', 1)->where('type', 3)->paginate(4);
                }
            }

        } else {
            if ($this->typeSearch == 'الكل') {
                $delive = User::search($this->SearchWord)->where('type', 3)->paginate(4);

            } elseif ($this->typeSearch == 'غير مشغولين') {
                $delive = User::search($this->SearchWord)->where('stuts_delivery', null)->where('type', 3)->paginate(4);
            } else {
                $delive = User::search($this->SearchWord)->where('stuts_delivery', 1)->where('type', 3)->paginate(4);
            }
        }

        $Areas = Area::get();
        return view('livewire.dashbord-order', \compact('orderCount', 'Orders', 'clintData', 'CardReq', 'delive', 'ReqDelDetlises', 'produactDeliver', 'Areas'));
    }

    public function OrdarClose()
    {
        $this->order = true;
    }

    public function NewOrder()
    {
        $this->order = !$this->order;
        $id = CardData::where('stutus', null)->first()->value('id');
        $this->title = " : طلب رقم " . $id;
        $this->orderData = CardData::where('stutus', null)->get();
        $this->clintDataa = CardData::where('stutus', null)->first();
        $this->cardRequest = CardProData::where('card_data_id', $id)->get();

    }

    public function deliveryTask()
    {
        /* 'deliver_id',
        'card_info_id',
        'stuts',
        'qr_code', */
        $this->DeliveyTaskShow = true;
        $this->delTaskK = DeliverReq::where('stuts', '!=', 1)->get();
    }
    public function DeliveReqDetile($id)
    {
        $this->ShowDetliesDeliReqVar = false;
        $this->detelis = $id;
        $this->DeliveReqDet = CardData::where('deliver_id', $id)->get();

    }
    public function ShowDetliesDeliReqClose()
    {
        $this->ShowDetliesDeliReqVar = 0;

    }
    public function ShowDetliesDeliReqMethod($id)
    {
// $proD = CardData::where('deliver_id', $id)->value('id');
        $this->produactDel = CardProData::where('card_data_id', $id)->get();
        $this->ShowDetliesDeliReqVar = $id;
    }
    public function OrderDetlis($id)
    {

    }
}
