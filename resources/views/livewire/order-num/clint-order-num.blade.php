<div>
    <div wire:loading id="loader"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="uppercase caption-subject bold font-dark">{{ $title }}</span>

                    </div>
                    <div class="actions">
                        @if ($CardID == null)
                            <a class="btn btn-circle" href="{{ url('/') }}"><i class="">الرئيسية</i>
                            @elseif($CardID == 'own')
                                <button wire:click='backForAllOrder()' class="btn btn-circle">رجــوع</button>
                            @else
                                <button wire:click='ClintOrder({{ $CardID }})' class="btn btn-circle">رجــوع</button>
                        @endif
                        </a>

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="dashboard_amchart_1" class="CSSAnimationChart">
                        <div class="row">
                            <table class="table">
                                @if ($ListClintOrder)

                                    <tr class="title">
                                        <th>اسم العميل</th>
                                        <th>رقم الهاتف</th>
                                        {{-- <th>موقع الطلب</th>
                                        --}}
                                        <th>عدد الطلبات</th>
                                    </tr>

                                    @foreach ($data as $i)
                                        <tr wire:click='ClintOrder({{ $i->id }})' class="inner">
                                            <td>{{ $i->name }}</td>
                                            <td>{{ $i->phone }}</td>
                                            {{-- <td>
                                                {{ $i->area->area_name ?? '' }}
                                                {{ '' . ',' . '' }}
                                                {{ $i->village->village_name ?? '' }}

                                            </td> --}}
                                            <td>{{ $i->clint_order_num }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    @if ($HasManyOrder)
                                        <tr class="title">
                                            <th>وقت الطلب</th>
                                            <th>عدد الطلبات</th>
                                            <th>قيمة الطلبات</th>
                                            <th>حالة الطلب</th>
                                        </tr>
                                        @foreach ($CardList as $i)
                                            @php
                                            $coun =\App\CardProData::where('card_data_id', $i->id)->count();
                                            $price =\App\CardProData::where('card_data_id', $i->id)->sum('price');
                                            @endphp
                                            <tr wire:click='ShowClintOrderDetiles({{ $i->id }})' class="inner">
                                                <td>{{ $i->created_at }}</td>
                                                <td>{{ $coun }}</td>
                                                <td>{{ $price }}</td>
                                                @if ($i->order_stutus == null)
                                                    <td>لم يتم التسليم</td>
                                                @else
                                                    <td> تم التسليم</td>

                                                @endif
                                            </tr>
                                        @endforeach
                                    @else


                                        <thead class="thead-dark">
                                        <tbody>

                                            <tr class="title">
                                                <th> اسم العميل </th>
                                                <td colspan="2">:&nbsp;{{ $CardDataDetils->clint->name ?? '' }}</td>
                                                <th> رقم الهاتف </th>
                                                <td>:&nbsp; {{ $CardDataDetils->clint_phone }}</td>
                                            </tr>
                                            <tr class="title">
                                                <th> المنطقة </th>
                                                <td colspan="2">
                                                    :&nbsp;{{ $CardDataDetils->village->village_name . ',' . $CardDataDetils->area->area_name }}
                                                </td>
                                                <th> اقرب معلم </th>
                                                <td>:&nbsp;{{ $CardDataDetils->near_flg ?? '' }}</td>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr class="title">
                                                <th>الطلبات</th>
                                                <th>الكمية</th>
                                                <th>السعر</th>
                                                <th>التاجر</th>
                                                <th> المجموع</th>
                                            </tr>

                                            @foreach ($CardDataDetilsProduact as $i)

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
                                                <td colspan="">
                                                    @if ($CardDataDetils->deliver_id == null)
                                                        لم يتم التحديد
                                                    @else
                                                        {{ $CardDataDetils->deliver->name . ' ' . '|' . ' ' . 'المحلية' . ' : ' . $CardDataDetils->deliver->area->area_name }}
                                                    @endif
                                                    </button>
                                                </td>
                                                <th></th>
                                                <th>رقم المندوب</th>
                                                <td>{{ $CardDataDetils->deliver->phone ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th>زمن الطلب</th>
                                                <td>{{ $CardDataDetils->created_at }}</td>
                                                <th></th>
                                                <th>رقم الطلب</th>
                                                <td>{{ $CardDataDetils->id }}</td>
                                            </tr>
                                            <tr>
                                                <th> الزمن المتوقع للتوصيل :</th>

                                                <td>
                                                    {{ $CardDataDetils->time_respact }}
                                                </td>
                                            </tr>

                                        </tbody>
                            </table>
                            @endif

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    tr.title {
        background-color: #fdd835 !important;
        color: #337ab7 !important;
    }

    th.title-data {

        border-color: #fff !important;
        font-size: 18px;
    }

    td {
        color: #678298;
    }

    tr.inner {
        background-color: #ecdd97;
    }

    .title-data {
        font-size: 22px;
        color: #c5aa31;
        margin: 0 5px 10px;
    }

    tr.inner:hover {
        background-color: #fdd835;
        color: #678298;
        font-weight: bold;
        cursor: pointer;

    }

</style>
