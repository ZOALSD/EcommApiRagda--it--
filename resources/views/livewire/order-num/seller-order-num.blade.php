<div>
    {{-- --}}

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
                            @if ($TitleInvoce)

                                <a class="btn btn-circle" href="{{ url('/') }}"><i class="">الرئيسية</i>
                                @else
                                    <a class="btn btn-circle" href="{{ url('/InvoceSeller') }}"><i class="">رجوع</i>
                            @endif
                            </a>

                            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="dashboard_amchart_1" class="CSSAnimationChart">
                            <div class="row">

                                <table class="table">
                                    @if ($TitleInvoce)

                                        <tr class="title">
                                            <th>اسم التأجر</th>
                                            <th>رقم التأجر</th>
                                            <th>مكان التأجر</th>
                                            <th>حـالة الفاتورة</th>
                                            <th>تاريـخ الفاتورة</th>
                                        </tr>

                                        @foreach ($InvrceSeler as $i)
                                            <tr wire:click='InvoceDetiles({{ $i->id }})' class="inner">
                                                <td>{{ $i->seller->name }}</td>
                                                <td>{{ $i->seller->phone }}</td>
                                                <td>{{ $i->seller->area->area_name }}</td>
                                                @if ($i->stutus_seller == null)
                                                    <td>غير مستحقة</td>
                                                @else
                                                    <td> مستحقة</td>

                                                @endif
                                                <td>{{ $i->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="title">
                                            <th>الطلبات</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>المجموع</th>

                                        </tr>
                                        @foreach ($CardPro as $i)
                                            <tr>
                                                <td>{{ $i->produact->cate_name }}
                                                </td>
                                                <td>{{ $i->quantity }}</td>
                                                <td>{{ $i->price }}</td>
                                                <td>{{ $i->quantity * $i->price }}</td>
                                            </tr>

                                        @endforeach
                                        <tr>
                                            <th>وقت اصدار الفاتورة</th>
                                            <td colspan="3">{{ $invoceSeller->created_at }}</td>

                                        </tr>

                                        <tr>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr>
                                            <th>اسم مندوب التوصيل</th>
                                            <td>{{ $invoceSeller->deliver->name }}</td>
                                            <th>رقم مندوب التوصيل</th>
                                            <td>{{ $invoceSeller->deliver->phone }}</td>
                                        </tr>
                                    @endif

                                </table>

                            </div>
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
