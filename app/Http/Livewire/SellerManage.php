<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class SellerManage extends Component
{
    public function render()
    {
        $seller = User::where('type', 2)->get();
        return view('livewire.seller-manage'
            , compact('seller'))
            ->extends('admin.index')
            ->section('content');
    }
}
