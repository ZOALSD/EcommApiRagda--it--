<div>

    @if ($order == true)

        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="#">
                    <div wire:click='NewOrder' class="dashboard-stat2 bordered">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="7800">{{ $orderCount }}</span>
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
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="1349">0</span>
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
                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                <span class="sr-only">85% change</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 85% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="567">88</span>
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
                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                <span class="sr-only">45% grow</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> grow </div>
                            <div class="status-number"> 45% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 bordered">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="276">997</span>
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
                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                <span class="sr-only">56% change</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 57% </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="uppercase caption-subject bold font-dark">{{ $title }}</span>
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
                            @foreach ($Orders as $i)
                                {{ $i->id }}
                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    @endif

</div>
