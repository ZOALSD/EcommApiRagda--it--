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

                        <a class="btn btn-circle" href="{{ url('/') }}"><i class="">الرئيسية</i>
                        </a>

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="dashboard_amchart_1" class="CSSAnimationChart">
                        <div class="row">
                            <table class="table">
                                <tr class="title">
                                    <th>اسم العميل</th>
                                    <th>رقم الهاتف</th>
                                    {{-- <th>موقع الطلب</th>
                                    --}}
                                    <th>عدد الطلبات</th>
                                </tr>

                                @foreach ($data as $i)
                                    <tr class="inner">
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
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
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

    tr.inner:hover {
        background-color: #fdd835;
        color: #678298;
        font-weight: bold;
        cursor: pointer;

    }

</style>
