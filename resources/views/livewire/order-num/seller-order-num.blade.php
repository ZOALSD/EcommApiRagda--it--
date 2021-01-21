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

                                <button class="btn btn-success">بحث</button>


                                <a class="btn btn-circle" href="{{ url('/') }}"><i class="">الرئيسية</i>
                                @else
                                    <a target="_blank" href="{{ url('SellerInvicePdf/' . $IdInvce) }}"
                                        class="btn btn-info">طباعة</a>

                                    <a class="btn btn-circle" href="{{ url('/InvoceSeller') }}"><i class="">رجوع</i>
                            @endif
                            </a>

                            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                        </div>

                    </div>
                    <div>
                        {{-- <select wire:model.lazy='Stutus'>
                            <option value="" selected class="hide">الحـالة</option>
                            <option value="0">الكل</option>
                            <option value="1">مستحقة</option>
                            <option value="2">غير مستحقة</option>
                        </select>
                        <select wire:model.lazy='AreaVar'>
                            <option value="" selected class="hide">المدينة</option>
                            <option value="0">الكل</option>
                            @foreach ($area as $i)
                                <option value="{{ $i->id }}">{{ $i->area_name }}</option>
                            @endforeach
                        </select>


                        <select wire:model.lazy='ClintVar'>
                            <option value="" selected class="hide">التُجار</option>
                            @foreach ($Clint as $i)
                                <option value="{{ $i->id }}">{{ $i->name }}</option>
                            @endforeach
                        </select> --}}



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
                                            <th>اسم التأجر </th>
                                            <th>رقم التاجر</th>
                                            <th colspan="2">مكان التاجر</th>

                                        </tr>
                                        <tr>
                                            <td>{{ $invoceSeller->seller->name }}</td>
                                            <td>{{ $invoceSeller->seller->phone }}</td>
                                            <td colspan="2">{{ $invoceSeller->seller->area->area_name }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> </td>
                                        </tr>
                                        <tr class="title">
                                            <th>الطلبات</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>المبلغ المستحق</th>

                                        </tr>
                                        @foreach ($CardPro as $i)
                                            <tr>
                                                <td>{{ $i->produact->cate_name }}
                                                </td>
                                                <td>{{ $i->quantity }}</td>
                                                <td>{{ $i->price }}</td>
                                                <td>{{ $i->seller_percent }}</td>
                                            </tr>

                                        @endforeach


                                        <tr>
                                            <td colspan="4"></td>
                                        </tr>
                                        <tr class="title">
                                            <th colspan="2">اسم مندوب التوصيل</th>
                                            <th colspan="2">رقم مندوب التوصيل</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{{ $invoceSeller->deliver->name }}</td>
                                            <td colspan="2">{{ $invoceSeller->deliver->phone }}</td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr class="title">
                                            <th colspan="2">وقت اصدار الفاتورة</th>
                                            <th colspan="2"> الوقت المتوقع للتوصيل</th>

                                        </tr>
                                        <tr>
                                            <td colspan="2">{{ $invoceSeller->created_at }}</td>
                                            <td colspan="2">{{ $CardInfo->time_respact }}</td>

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

    input,
    select {
        height: 30px;
        border: 1px solid #fdd835;
        margin: 2px;
    }

    .hide {
        display: none;
    }

</style>
