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
                        @if (!$CardDeliverInfo)
                            <a class="btn btn-info" href="{{ route('DeliverInvice', $CardID) }}"><i class="">طباعة</i>

                        @endif
                        <a class="btn btn-circle" href="{{ url('/') }}"><i class="">الرئيسية</i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="dashboard_amchart_1" class="CSSAnimationChart">
                        <div class="row">
                            <table class="table">
                                @if ($CardDeliverInfo)

                                    <tr class="title">
                                        <th>رقم الطلب</th>
                                        <th>اسم المندوب</th>
                                        <th>رقم لمندوب</th>
                                        <th>مكان العميل</th>
                                        <th>زمـن الطلب</th>
                                        <th>الزمن المتوقع للتوصيل</th>
                                        <th>حالة الطلب</th>
                                    </tr>


                                    @foreach ($deliver as $i)
                                        <tr wire:click='DeliverOrderDetiles({{ $i->id }})' class="NotReady">
                                            <td>{{ $i->id }}</td>
                                            <td>{{ $i->deliver->name }}</td>
                                            <td>{{ $i->deliver->phone }}</td>
                                            <td>{{ $i->area->area_name . ',' . $i->village->village_name }}</td>
                                            <td>{{ $i->created_at }}</td>
                                            <td>{{ $i->time_respact }}</td>
                                            @if ($i->order_stutus == null)
                                                <td>لم يـتم التسـليم</td>
                                            @else
                                                <td> تم التسـليم</td>
                                            @endif
                                        </tr>

                                    @endforeach

                                @else
                                    <tr>

                                        <th class="title-data">
                                            بيانات العميل :
                                        </th>
                                    </tr>

                                    <tr class="title ">
                                        <th>الاسم</th>
                                        <th colspan="2">المكان</th>
                                        <th>رقم الهاتف</th>
                                        <th>زمـن الطلب</th>
                                        <th colspan="2">الزمن المتوقع للتوصيل</th>
                                    </tr>

                                    <tr class="inner">
                                        <td>{{ $ClintData->clint->name }}</td>
                                        <td colspan="2">
                                            {{ $ClintData->area->area_name . ' ' . ',' . ' ' . $ClintData->village->village_name }}
                                        </td>
                                        <td>{{ $ClintData->clint->phone }}</td>
                                        <td>{{ $ClintData->created_at }}</td>
                                        <td colspan="2">{{ $ClintData->time_respact }}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>

                                    <tr>
                                        <th class="title-data">
                                            تفاصيل الطلب :
                                        </th>
                                    </tr>

                                    <tr class="title">
                                        <th>الطلبات</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>التاجر</th>
                                        <th> مكان التاجر </th>
                                        <th> رقم التاجر</th>
                                        <th> المجموع</th>
                                    </tr>


                                    <tr class="inner">
                                        <td>{{ $NotReDetils->produact->cate_name }}</td>
                                        <td>{{ $NotReDetils->quantity }}</td>
                                        <td>{{ $NotReDetils->price }}</td>
                                        <td>{{ $NotReDetils->seller->name }}</td>
                                        <td>{{ $NotReDetils->seller->area->area_name . '' . ' , ' . ' ' . $NotReDetils->seller->village->village_name }}
                                        </td>
                                        <td>{{ $NotReDetils->seller->phone }}</td>
                                        <td>{{ $NotReDetils->total }}</td>
                                    </tr>


                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                        <th class="title-data">
                                            بيانات مندوب التوصيل :
                                        </th>
                                    </tr>

                                    <tr class="title">
                                        <th colspan="2">الاسم</th>
                                        <th colspan="2">رقم الهاتف</th>
                                        <th colspan="3">المكان</th>
                                    </tr>
                                    <tr class="inner">
                                        <td colspan="2">{{ $ClintData->deliver->name }} </td>
                                        <td colspan="2">{{ $ClintData->deliver->phone }} </td>
                                        <td colspan="3">
                                            {{ $ClintData->deliver->area->area_name . '' . ' , ' . '' . $ClintData->deliver->village->village_name }}
                                        </td>
                                    </tr>
                                @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .NotReady:hover {
        background-color: #fdd835;
        color: #678298;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 1px 3px 5px 1px #889679;

    }

    tr.title {
        background-color: #fdd835;
        color: #678298;
        font-weight: bold;
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

</style>
