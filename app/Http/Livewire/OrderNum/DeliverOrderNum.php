<?php

namespace App\Http\Livewire\OrderNum;

use Livewire\Component;

class DeliverOrderNum extends Component
{
    public function render()
    {
        return view('livewire.order-num.deliver-order-num')
            ->extends('admin.index')
            ->section('content');
    }
}
