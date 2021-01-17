<div>
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="#">
                <div wire:click='NewReqOrder' class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span wire:poll.5000m data-counter="counterup"
                                    data-value="7800">{{ $orderCount }}</span>
                                <small class="font-green-sharp"></small>
                            </h3>
                            <small><button class="btn btn-success">الطلبات
                                    الجديدة</button></small>
                        </div>

                        <!--div class="icon">
                        <i class="fa fa-truck"></i>
                    </div-->
                    </div>

                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                <span class="sr-only">100% progress</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> {{ $orderCount }} </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div wire:click='OrderNotReadyy()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">{{ $NotReadyCount }}</span>
                        </h3>
                        <small><button class="btn btn-danger">
                                الطلبات قيد التحضير</button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only">{{ $NotReadyCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $NotReadyCount }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div wire:click='OrderInderDelivering()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567">{{ $InderDeliverCount }}</span>
                        </h3>
                        <small><button class="btn btn-info">
                                الطلبات قيد التوصيل</button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">{{ $InderDeliverCount }}% grow</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> grow </div>
                        <div class="status-number"> {{ $InderDeliverCount }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div wire:click='OrderSuccessfullyDelivery()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276">{{ $SuccessflluCount }}</span>
                        </h3>
                        <small><button class="btn btn-success">
                                الطلبات تم تسليمها</button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only">{{ $SuccessflluCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $SuccessflluCount }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="#">
                <div wire:click='InvoceSeller' class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span wire:poll.5000m data-counter="counterup"
                                    data-value="7800">{{ $SellerMonyCount }}</span>
                                <small class="font-green-sharp"></small>
                            </h3>
                            <small><button class="btn btn-success">
                                    فواتير الــتُجار</button></small>
                        </div>

                        <!--div class="icon">
                        <i class="fa fa-truck"></i>
                    </div-->
                    </div>

                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                <span class="sr-only">100% progress</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> {{ $SellerMonyCount }} </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div wire:click='clinteOrderNum()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">{{ $ClintMonyCount }}</span>
                        </h3>
                        <small><button class="btn btn-info">
                                فؤاتير العملاء </button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">{{ $ClintMonyCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $ClintMonyCount }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div wire:click='deliverOrderNum()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">{{ $ClintMonyCount }}</span>
                        </h3>
                        <small><button class="btn btn-info">
                                فؤاتير مناديب التؤصيل </button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">{{ $ClintMonyCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $ClintMonyCount }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="#">
                <div wire:click='Clints()' class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span wire:poll.5000m data-counter="counterup"
                                    data-value="7800">{{ $ClintCount }}</span>
                                <small class="font-green-sharp"></small>
                            </h3>
                            <small><button class="btn btn-success">العملاء</button></small>
                        </div>

                        <!--div class="icon">
                        <i class="fa fa-truck"></i>
                    </div-->
                    </div>

                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                <span class="sr-only">100% progress</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> {{ $ClintCount }} </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div wire:click='Sellers()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="1349">{{ $DeliveryCount }}</span>
                        </h3>
                        <small><button class="btn btn-danger">
                                التُجّــار </button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only">{{ $DeliveryCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $DeliveryCount }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div wire:click='Deliveres()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="567">{{ $SellerCount }}</span>
                        </h3>
                        <small><button class="btn btn-info">
                                مناديب الؤصيل</button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">{{ $SellerCount }}% grow</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> grow </div>
                        <div class="status-number"> {{ $InderDeliverCount }} </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div wire:click='OrderSuccessfullyDelivery()' class="dashboard-stat2 bordered">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="276">{{ $SuccessflluCount }}</span>
                        </h3>
                        <small><button class="btn btn-success">
                                الطلبات تم تسليمها</button></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only">{{ $SuccessflluCount }}</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> change </div>
                        <div class="status-number"> {{ $SuccessflluCount }} </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>


</div>

{{--
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="uppercase caption-subject bold font-dark"> اختار من القائمة </span>

                </div>
                <div class="actions">
                    <a wire:click='OrdarClose' class="btn btn-circle btn-icon-only btn-default " href="#"><i
                            class="fa fa-close"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="dashboard_amchart_1" class="CSSAnimationChart">

                    {{--
                    Body Her
                    -}}


                </div>
            </div>
        </div>
    </div>
</div> --}}
