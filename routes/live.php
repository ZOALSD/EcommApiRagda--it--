<?php

use App\Http\Livewire\MainDashbrod;
use App\Http\Livewire\OrderNum\ClintOrderNum;
use App\Http\Livewire\OrderNum\DeliverOrderNum;
use App\Http\Livewire\OrderNum\SellerOrderNum;
use App\Http\Livewire\Request\Clints;
use App\Http\Livewire\Request\Deliveres;
use App\Http\Livewire\Request\NewOrderReq;
use App\Http\Livewire\Request\OrderInDelivering;
use App\Http\Livewire\Request\OrderNotReady;
use App\Http\Livewire\Request\OrderSuccessfullyDelivered;
use App\Http\Livewire\Request\Selleres;

Route::group(['middleware' => 'admin:admin'], function () {

    Route::get('/', MainDashbrod::class)->name('MainDashBord');
    // Route::get('/Order', DashbordOrder::class)->name('Order');//NewOrderReq
    Route::get('/Order', NewOrderReq::class)->name('Order'); //NewOrderReq
    Route::get('/OrderNotR', OrderNotReady::class)->name('OrderNotReadyy');
    Route::get('/OrderInderDeliver', OrderInDelivering::class)->name('OrderInderDelivering');
    Route::get('/OrderSuccessfullyDelivered', OrderSuccessfullyDelivered::class)->name('OrderSuccessfullyDelivery');

    Route::get('/Clints', Clints::class)->name('Clints');
    Route::get('/Deliveres', Deliveres::class)->name('Deliveres');
    Route::get('/Selleres', Selleres::class)->name('Sellers');

    Route::get('/deliverOrdeNum', DeliverOrderNum::class)->name('deliverOrdeNum');
    Route::get('/clintOrdeNum', ClintOrderNum::class)->name('clinteOrderNum');
    Route::get('/sellerOrdeNum', SellerOrderNum::class)->name('sellerOrdeNum');
});
