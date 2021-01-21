<?php

namespace App\Http\Livewire;

use App\CardProData;
use App\Model\Area;
use App\Model\CardData;
use App\Model\CardRequest;
use App\Model\SellerOrder;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashbordOrder extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $order = false;
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
    public $ReQNumber;
    public $DeliverySelectedChangeBtn = 0;
    public $IdOFFirstReQORSelected;
    public $DeliverySelectedIdBtnActive;
    public $DeliverySelectedIdBtnActiveSelected;
    public $ShowImageOrder = false;
    public $TiemRespact = null;
    public $FoundOrder = true;
    public $DeliverPercent = null;

    public function render()
    {
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

        $this->NewOrder();

        $orderCount = 7; //QRCodeOrder::where('stusts',0)->count();
        $Orders = $this->orderData; //= Card::where('stusts', 2)->get();
        $clintData = $this->clintDataa;
        $CardReq = $this->cardRequest;
        $delTask = $this->delTaskK;
        $ReqDelDetlises = $this->DeliveReqDet;
        $produactDeliver = $this->produactDel;
        $Areas = Area::get();
        return view('livewire.dashbord-order',
            compact
            (
                'orderCount', 'Orders',
                'clintData', 'CardReq',
                'delive', 'ReqDelDetlises',
                'produactDeliver', 'Areas'
            ))
            ->extends('admin.index')
            ->section('content');
    }

    public function SearchDlivery()
    {

    }

    public function OrdarClose()
    {
        $this->order = true;
    }

    public function NewOrder()
    {
        //  $this->order = !$this->order;
        $count = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->count();
        if ($count != 0) {
            if ($this->DeliverySelectedIdBtnActiveSelected == null) {

                $data = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->first();

                $this->DeliverySelectedIdBtnActive = $data->id;
                $this->title = " : طلب رقم " . $data->id;
                $this->ReQNumber = $data->id;
                $this->orderData = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->get();
                $this->clintDataa = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->first();
                $IdOFF = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->first();
                $this->IdOFFirstReQORSelected = $IdOFF->id;
                $this->cardRequest = CardProData::where('card_data_id', $data->id)->get();
            } else {
                $this->DeliverySelectedIdBtnActive = $this->DeliverySelectedIdBtnActiveSelected;
                $id = $this->DeliverySelectedIdBtnActiveSelected;
                $this->title = " : طلب رقم " . $id;
                $this->ReQNumber = $id;
                $this->orderData = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->get();
                $this->clintDataa = CardData::where('id', $id)->first();
                $this->IdOFFirstReQORSelected = $id;
                $this->cardRequest = CardProData::where('card_data_id', $id)->get();
                $this->IdOFFirstReQORSelected = $id;
            }

        } else {
            $this->FoundOrder = false;
            $this->title = "لا يـوجد طلبــات جــديدة";

        }

    }
    public function ShowRequestDetils($id)
    {
        $this->DeliverySelectedIdBtnActiveSelected = $id;
        $this->title = " : طلب رقم " . $id;
        // $this->ReQNumber = $id;

    }

    public function AdminStutusChange($id)
    {
        $DeliverySelectedChangeBtn = null;
        $CheckDeliver = CardData::where('id', $id)->value('deliver_id');
        if ($CheckDeliver != null && $this->DeliverPercent != null) {
            if ($this->TiemRespact != null) {
                CardData::where('id', $id)->update([
                    'admin_stutus' => 1,
                    'deliver_Percent' => $this->DeliverPercent,
                    'time_respact' => $this->TiemRespact,
                ]);

                $count = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->count();
                if ($count != 0) {
                    $this->title = "لا يـوجد طلبــات جــديدة";
                    $this->ShowImageOrder = true;
                    // $this->clintDataa = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->first();
                } else {
                    $this->title = "لا يـوجد طلبــات جــديدة";
                }
                $this->orderData = CardData::where('clint_stutus', 1)->where('admin_stutus', null)->get();

                SellerOrder::where([
                    'card_cata_id' => $id,
                    'stutus_clint' => 1,
                    'stutus_admin' => null])
                    ->update([
                        'deliver_id' => $CheckDeliver,
                        'stutus_admin' => 1]);

                session()->flash('successuflly', 'تم ارسال الطلب بنجاح');
                return redirect()->to('/Order');

            } else {
                session()->flash('danger', 'الرجاء تحديـد الزمن المتوقع للتوصيل اولاً');

            }

        } else {
            session()->flash('danger', 'الرجاء تحديـد مندوب التوصيل والعمولة');

        }

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

    public function selectDelivery($id)
    {
        // User::where('id', $id)->update(['stuts_delivery' => 1]);
        //ReQNumber
        CardData::where('id', $this->IdOFFirstReQORSelected)->update(['deliver_id' => $id]);
        $this->DeliverySelectedChangeBtn = $id;
        User::where('id', $id)->update(['stuts_delivery' => 1]);
        $this->clintDataa = CardData::where('id', $this->IdOFFirstReQORSelected)->first();
        $this->emit('DeliverySelectedHide');

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
