<?php

namespace App\Http\Livewire\OrderNum;

use App\CardProData;
use App\Model\CardData;
use App\User;
use Livewire\Component;

class ClintOrderNum extends Component
{
    public $title = "فؤاتـير العمـلاء";
    public $ListClintOrder = true;
    public $HasManyOrder = false;
    public $CardDataDetils;
    public $CardDataDetilsProduact;
    public $CardList;

    public function render()
    {
        $data = User::where('clint_order_num', '!=', null)
            ->orderByDesc('clint_order_num')
            ->get();

        return view('livewire.order-num.clint-order-num'
            , compact('data', $this->CardDataDetils, $this->CardDataDetilsProduact
                , $this->CardList))
            ->extends('admin.index')
            ->section('content');
    }

    public function ClintOrder($id)
    {
        $this->ListClintOrder = false;
        $coun = CardData::where(['clint_id' => $id, 'clint_stutus' => '1'])->count();
        if ($coun == 1) {
            $card = CardData::where('clint_id', $id)->first();
            $this->CardDataDetils = $card;
            $this->CardDataDetilsProduact = CardProData::where('card_data_id', $card->id)->get();
        } else {
            $this->HasManyOrder = true;
            $this->CardList = CardData::where(['clint_id' => $id, 'clint_stutus' => 1])->get();

        }

    }
}
