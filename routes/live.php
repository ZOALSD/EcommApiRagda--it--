<?php

use App\Http\Livewire\DashbordOrder;
use App\Http\Livewire\MainDashbrod;
use App\Http\Livewire\OrderNum\ClintOrderNum;
use App\Http\Livewire\OrderNum\DeliverOrderNum;
use App\Http\Livewire\OrderNum\SellerOrderNum;
use App\Http\Livewire\Request\Clints;
use App\Http\Livewire\Request\Deliveres;
use App\Http\Livewire\Request\OrderInDelivering;
use App\Http\Livewire\Request\OrderNotReady;
use App\Http\Livewire\Request\OrderSuccessfullyDelivered;
use App\Http\Livewire\Request\Selleres;
use App\Http\Livewire\SellerManage;

Route::group(['middleware' => 'admin:admin'], function () {

    Route::get('/', MainDashbrod::class)->name('MainDashBord');
    Route::get('/Order', DashbordOrder::class)->name('Order')->middleware('permission:new_order');
    Route::get('/OrderNotR', OrderNotReady::class)->name('OrderNotReadyy')->middleware('permission:order_in_seller');
    Route::get('/OrderInderDeliver', OrderInDelivering::class)->name('OrderInderDelivering')->middleware('permission:order_in_delivery');
    Route::get('/OrderSuccessfullyDelivered', OrderSuccessfullyDelivered::class)->name('OrderSuccessfullyDelivery')->middleware('permission:order_done');

    Route::get('/Clints', Clints::class)->name('Clints')->middleware('permission:clint');
    Route::get('/Deliveres', Deliveres::class)->name('Deliveres')->middleware('permission:delivery');
    Route::get('/Selleres', Selleres::class)->name('Sellers')->middleware('permission:seller');

    Route::get('/deliverOrdeNum', DeliverOrderNum::class)->name('deliverOrdeNum')->middleware('permission:invoce_delivery');
    Route::get('/clintOrdeNum', ClintOrderNum::class)->name('clinteOrderNum')->middleware('permission:invoce_clint');
    Route::get('/InvoceSeller', SellerOrderNum::class)->name('InvoceSeller')->middleware('permission:invoce_seller');

    Route::get('/SellerManage', SellerManage::class)->middleware('permission:seller');

});
