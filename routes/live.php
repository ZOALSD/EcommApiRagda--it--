<?php

use App\Http\Livewire\DashbordOrder;
use App\Http\Livewire\MainDashbrod;
use App\Http\Livewire\Request\OrderInDelivering;
use App\Http\Livewire\Request\OrderNotReady;
use App\Http\Livewire\Request\OrderSuccessfullyDelivered;

Route::group(['middleware' => 'admin:admin'], function () {

    Route::get('/', MainDashbrod::class)->name('MainDashBord');
    Route::get('/Order', DashbordOrder::class)->name('Order');
    Route::get('/OrderNotR', OrderNotReady::class)->name('OrderNotReadyy');
    Route::get('/OrderInderDeliver', OrderInDelivering::class)->name('OrderInderDelivering');
    Route::get('/OrderSuccessfullyDelivered', OrderSuccessfullyDelivered::class)->name('OrderSuccessfullyDelivery');

});
