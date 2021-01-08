<?php

namespace App\Http\Livewire\OrderNum;

use App\User;
use Livewire\Component;

class ClintOrderNum extends Component
{
    public $title = "فؤاتـير العمـلاء";
    public function render()
    {
        $data = User::where('clint_order_num', '!=', null)
            ->orderByDesc('clint_order_num')
            ->get();

        return view('livewire.order-num.clint-order-num'
            , compact('data'))
            ->extends('admin.index')
            ->section('content');
    }
}
