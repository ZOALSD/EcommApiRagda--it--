<?php

namespace App\Http\Livewire\OrderNum;

use Livewire\Component;

class SellerOrderNum extends Component
{
    public function render()
    {
        return view('livewire.order-num.seller-order-num')
            ->extends('admin.index')
            ->section('content');
    }
}
