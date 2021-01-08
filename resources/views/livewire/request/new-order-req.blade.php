<div>
    @if (session()->has('success'))
        <div wire:poll.5000ms class="alert alert-success" role="alert">
            <p>
                {{ session('success') }}
            </p>
        </div>


    @endif

    @if (session()->has('danger'))
        <div wire:poll.10000ms class="alert alert-danger" role="alert">
            <p>
                {{ session('danger') }}
            </p>
        </div>
    @endif

    <div wire:loading id="loader"></div>

    @if ($order == true)
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            @if ($ShowImageOrder)
                                <span class="uppercase caption-subject bold font-dark"> اختار من القائمة </span>
                            @else
                                <span class="uppercase caption-subject bold font-dark">{{ $title }} </span>
                            @endif
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
                                <div class="col-md-9 border-righet">

                                    @if (!$ShowImageOrder)
                                        @if ($title == 'لا يـوجد طلبــات جــديدة')
                                            <div class="noorders"></div>
                                        @endif
                                    @endif


                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tbody>
                                            @if ($title !== 'لا يـوجد طلبــات جــديدة')

                                                <tr>
                                                    <th> اسم العميل </th>
                                                    <td>:&nbsp;{{ $clintData->clint->name ?? '' }}</td>
                                                    <th> المحلية </th>
                                                    <td>:&nbsp;{{ $clintData->area->area_name ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th> المنطقة </th>
                                                    <td>:&nbsp;{{ $clintData->village->village_name ?? '' }}</td>
                                                    <th> اقرب معلم </th>
                                                    <td>:&nbsp;{{ $clintData->near_flg ?? '' }}</td>
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
                                                    <td colspan=""> <button data-toggle="modal"
                                                            data-target="#DeliverySelectedHide" class="btn btn-info">
                                                            @if ($clintData->deliver_id == null)
                                                                تحـديد
                                                            @else
                                                                {{ $clintData->deliver->name . ' ' . '|' . ' ' . 'المحلية' . ' : ' . $clintData->deliver->area->area_name }}
                                                            @endif
                                                        </button> </td>
                                                    <th></th>
                                                    <th>رقم المندوب</th>
                                                    <td>{{ $clintData->deliver->phone ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>زمن الطلب</th>
                                                    <td>{{ $clintData->created_at }}</td>
                                                    <th></th>
                                                    <th>رقم الطلب</th>
                                                    <td>{{ $clintData->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th> الزمن المتوقع للتوصيل :</th>

                                                    <td>
                                                        <input wire:model.lazy='TiemRespact' type="datetime-local"
                                                            class="form-control" name='TiemRespact'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="2" class="center">
                                                        <button wire:click='AdminStutusChange({{ $clintData->id }})'
                                                            class="btn btn-success btn-block">إرسال</button>
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
                                            @endif

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
                                            @if ($ShowImageOrder)
                                                @foreach ($Orders as $i)
                                                    <a>
                                                        @if ($DeliverySelectedIdBtnActive == $i->id)
                                                            <tr wire:click='showRequestDetilesForAmin({{ $i->id }})'
                                                                class="req-hover ActiveDelivery pointer">
                                                            @else
                                                            <tr wire:click='showRequestDetilesForAmin({{ $i->id }})'
                                                                class="req-hover pointer">
                                                        @endif
                                                        <td>{{ $i->clint->name }}</td>
                                                        <td>{{ $i->area->area_name }}</td>
                                                        </tr>

                                                    </a>
                                                @endforeach
                                            @else

                                                @if ($title != 'لا يـوجد طلبــات جــديدة')

                                                    @foreach ($Orders as $i)
                                                        <a>
                                                            @if ($DeliverySelectedIdBtnActive == $i->id)
                                                                <tr wire:click='ShowRequestDetils({{ $i->id }})'
                                                                    class="req-hover ActiveDelivery pointer">
                                                                @else
                                                                <tr wire:click='ShowRequestDetils({{ $i->id }})'
                                                                    class="req-hover pointer">
                                                            @endif
                                                            <td>{{ $i->clint->name }}</td>
                                                            <td>{{ $i->area->area_name }}</td>
                                                            </tr>

                                                        </a>
                                                    @endforeach
                                                @endif
                                            @endif


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
@if ($title != 'لا يـوجد طلبــات جــديدة')

    <form wire:submit.prevent action="/">
        <div wire:ignore.self class="modal fade" id="DeliverySelectedHide">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button class="close col-md-2" data-dismiss="modal">x</button>

                        <h4 class="modal-title col-md-4">مناديب التوصيل</h4>
                        <hr>
                        <select wire:model.lazy='typeSearch' class="input-text">
                            <option vlaue="*">الكل</option>
                            <option vlaue="">غير مشغولين</option>
                            <option vlaue=1> مشغولين</option>
                        </select>

                        <select wire:model.lazy='AreaModel' class="input-text" placeholder="المحلية">
                            <option selected class="hide">المحلية</option>
                            <option value="all">الكل</option>
                            @foreach ($Areas as $a)

                                <option value="{{ $a->id }}">{{ $a->area_name }}</option>
                            @endforeach

                        </select>

                        <input wire:model='SearchWord' class="input-text" type="text"
                            placeholder="بحث بالاسم او رقم الهاتف">
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>الاسم</th>
                                <th>رقم الهاتف</th>
                                <th>المحلية</th>
                                <th>الحالة</th>
                                <th>اختيار</th>
                            </tr>
                            @foreach ($delive as $i)

                                <tr>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->phone }}</td>
                                    <td>{{ $i->area->area_name }}</td>
                                    @if ($i->stuts_delivery == null)
                                        <td>غير مشغول</td>

                                        <td>
                                            <a wire:click='selectDelivery({{ $i->id }})' class="btn btn-info">
                                                @if ($DeliverySelectedChangeBtn == $i->id)
                                                    تـم التحـديد

                                                @else
                                                    تحـديـد
                                                @endif

                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a wire:click='DeliveReqDetile({{ $i->id }})'
                                                class="btn btn-scandary">مشغول</a>
                                        </td>

                                        <td>
                                            <a wire:click='selectDelivery({{ $i->id }})' class="btn btn-info">
                                                @if ($DeliverySelectedChangeBtn == $i->id)
                                                    تـم التحـديد
                                                @else
                                                    تحـديـد
                                                @endif

                                            </a>
                                        </td>
                                        @if ($detelis == $i->id)
                                            <div>
                                                @foreach ($ReqDelDetlises as $ReqDelDetlis)

                                <tr class="border-shod">
                                    <th>مكان العميل</th>
                                    <td>
                                        {{ $ReqDelDetlis->area->area_name . ' , ' . $ReqDelDetlis->village->village_name }}
                                    </td>

                                    <th>عدد الطلبات</th>
                                    <th>
                                        {{ \App\CardProData::where('card_data_id', $ReqDelDetlis->id)->count() }}
                                    </th>
                                    <th>
                                        @if ($ShowDetliesDeliReqVar == $ReqDelDetlis->id)
                                            <a wire:click='ShowDetliesDeliReqClose({{ $ReqDelDetlis->id }})'
                                                class="btn">اغلاق التفاصيل</a>
                                        @else
                                            <a wire:click='ShowDetliesDeliReqMethod({{ $ReqDelDetlis->id }})'
                                                class="btn">التقاصيل</a>
                                        @endif
                                    </th>

                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                @if ($ShowDetliesDeliReqVar == $ReqDelDetlis->id)

                                    <tr class="border-shodow">
                                        <th>الطلبات</th>
                                        <th>اسم التأجر</th>
                                        <th>مكان التأجر</th>
                                        <th> الكمية*السعر</th>
                                        <th>المجموع</th>
                                    </tr>
                                    @foreach ($produactDeliver as $ProDliverDetils)

                                        <tr class="border-shodow">
                                            <td>{{ $ProDliverDetils->produact->cate_name }}</td>
                                            <td>{{ $ProDliverDetils->seller->name }}</td>
                                            <td>{{ $ProDliverDetils->seller->area->area_name . ' , ' . $ProDliverDetils->seller->village->village_name }}
                                            </td>
                                            <td>
                                                {{ $ProDliverDetils->quantity . '*' . $ProDliverDetils->price }}
                                            </td>
                                            <td>
                                                {{ $ProDliverDetils->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="border-shodsum">
                                        <th>زمن الطلب</th>
                                        <td>{{ $ReqDelDetlis->created_at }}</td>
                                        <th>الزمن المتوقع للتوصيل</th>
                                        <td>
                                            {{ $ReqDelDetlis->time_respact ?? '' }}
                                        </td>
                                        <td>
                                            {{ \App\CardProData::where('card_data_id', $ReqDelDetlis->id)->sum('total') }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                    </div>
@endif

@endif


</tr>
@endforeach

</table>


</div>

<div class="modal-footer">
    <div class="row">
        <div class="col-md-6">
            {{ $delive->links() }}
        </div>
        <div class="col-md-6">
            <a class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</a>
        </div>

    </div>

</div>
</div>

</div>
</div>
</form>
@endif
<!--------------------------------------------------------------------------->

{{-- @if ($title == 'لا يـوجد طلبــات جــديدة')
    <img src="{{ url(Path() . '/img/noorders.png') }}" class="img-fluid" alt="Responsive image">
@endif --}}

<style>
    /*
    button.page-link {
        background-color: #fff;
        border: solid 1px #ddd;
        padding: 4px 10px;
        font-size: 17px;
        margin-left: -2px;
    }
*/
    .pointer {

        cursor: pointer;
    }

    .ActiveDelivery {
        background-color: #f1ca31;
    }

    .noorders {
        height: 400px;
        background-image: url("{{ url(Path() . '/img/noorders.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }

    .orders {
        height: 400px;
        background-image: url("{{ url(Path() . '/img/orders.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }


    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
    }

    .page-link {
        position: relative;
        display: block;
        color: #0d6efd;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
        .page-link {
            transition: none;
        }
    }

    .page-link:hover {
        z-index: 2;
        color: #0a58ca;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .page-link:focus {
        z-index: 3;
        color: #0a58ca;
        background-color: #e9ecef;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .page-item:not(:first-child) .page-link {
        margin-left: -1px;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .page-link {
        padding: 0.375rem 0.75rem;
    }

    .page-item:first-child .page-link {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    }

    .pagination-lg .page-link {
        padding: 0.75rem 1.5rem;
        font-size: 1.25rem;
    }

    .pagination-lg .page-item:first-child .page-link {
        border-top-left-radius: 0.3rem;
        border-bottom-left-radius: 0.3rem;
    }

    .pagination-lg .page-item:last-child .page-link {
        border-top-right-radius: 0.3rem;
        border-bottom-right-radius: 0.3rem;
    }

    .pagination-sm .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .pagination-sm .page-item:first-child .page-link {
        border-top-left-radius: 0.2rem;
        border-bottom-left-radius: 0.2rem;
    }

    .pagination-sm .page-item:last-child .page-link {
        border-top-right-radius: 0.2rem;
        border-bottom-right-radius: 0.2rem;
    }


    /**================================================*/
    .input-text {
        background-color: white;
        border: solid 1px #f1ca31;
        border-radius: 5px !important;
        height: 30px;
        margin: 5px
    }

    .input-text:focus {
        background-color: white;
        border: solid 1px #ffcc02;
        border-radius: 5px !important;
        height: 31px;
        margin: 6px
    }

    .border-shodow {
        background-color: #fdd8356b;

    }

    .border-shod {
        background-color: #fdd835;

    }

    .border-shodsum {
        background-color: #daca83;

    }

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
