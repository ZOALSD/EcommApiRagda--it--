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
                            <span class="uppercase caption-subject bold font-dark">{{ $title }} </span>
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
                            <div class="row">
                                <div class="col-md-9 border-righet ">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tbody>

                                            <tr>
                                                <th> اسم العميل </th>
                                                <td>:&nbsp;{{ $clintData->clint->name }}</td>
                                                <th> المحلية </th>
                                                <td>:&nbsp;{{ $clintData->area->area_name }}</td>
                                            </tr>
                                            <tr>
                                                <th> المنطقة </th>
                                                <td>:&nbsp;{{ $clintData->village->village_name }}</td>
                                                <th> اقرب معلم </th>
                                                <td>:&nbsp;{{ $clintData->near_flg }}</td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>الطلبات</th>
                                                <th>الكمية</th>
                                                <th>السعر</th>
                                                <th>التاجر</th>
                                                <th> المجموع</th>
                                            </tr>

                                            @foreach ($CardReq as $i)

                                                <tr>
                                                    <td>{{ $i->produact->cate_name }}</td>
                                                    <td>{{ $i->quantity }}</td>
                                                    <td>{{ $i->price }}</td>
                                                    <td>{{ $i->seller->name }}</td>
                                                    <td>{{ $i->total }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>

                                                <th colspan="">مندوب التوصيل</th>
                                                <td colspan=""> <button data-toggle="modal" data-target="#AddDelivery"
                                                        class="btn btn-info">modamed</button> </td>
                                                <th></th>
                                                <th>رقم المندوب</th>
                                                <td>0900004444</td>
                                            </tr>
                                            <tr>
                                                <th>زمن الطلب</th>
                                                <td>{{ $clintData->created_at }}</td>
                                                <th></th>
                                                <th>رقم الطلب</th>
                                                <td>{{ $clintData->id }}</td>
                                            </tr>

                                            <tr>
                                                <th></th>
                                                <th colspan="2" class="center">
                                                    <button class="btn btn-success btn-block">إرسال</button>
                                                </th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                                {{--==-**--------*===///////////=*===**----------==--}}
                                <div class="col-md-3 ">
                                    قائمة الطلبات
                                    <hr>

                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr class="">
                                                <th>اسم العميل</th>
                                                <th>المحلية</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Orders as $i)
                                                <tr class="req-hover">
                                                    <td>{{ $i->clint->name }}</td>
                                                    <td>{{ $i->area->area_name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE BASE CONTENT -->
    @endif

</div>

<!--------------------------------------------------------------------------->
<form wire:submit.prevent action="/">
    <div wire:ignore.self class="modal fade" id="AddDelivery">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">مناديب التوصيل</h4>
                    </h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>الاسم</th>
                            <th>رقم الهاتف</th>
                            <th>المحلية</th>
                            <th>الحالة</th>
                            <th>الصورة</th>
                        </tr>
                        @foreach ($delive as $i)

                            <tr>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->phone }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

                    </table>


                </div>

                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</a>
                </div>
            </div>

        </div>
    </div>
</form>
<!--------------------------------------------------------------------------->


<style>
    .req-hover:hover {
        background-color: #fdd835;
        font-size: 22px !important;
        font-weight: bold;
        color: white !important
    }

    .border-righet {
        border-left: 1px solid #fdd835;
    }

    .border-buttom {
        border-bottom: 1px solid #fdd835;
    }

</style>
