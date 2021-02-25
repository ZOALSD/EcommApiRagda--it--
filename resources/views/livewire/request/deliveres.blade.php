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

                        <a href="{{ url('deliverPdf') }}" class="btn btn-info" target="_blank">طباعة</a>
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
                                    <th> البريد الالكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ التسجيل</th>
                                    <th> تحصيل الرصيد الحالي </th>
                                    <th>الحد الاقصى </th>
                                    <th>الحـالة</th>
                                </tr>

                                @foreach ($clintsData as $i)
                                    <tr class="inner">
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>{{ $i->phone }}</td>

                                        <td>{{ $i->created_at->format('Y/m/d') }}</td>
                                        <td>

                                            @php
                                                $total = App\Model\CardData::where(['deliver_id' => $i->id, 'deliver_recive' => null])->sum('total');
                                            @endphp
                                            @if ($total != 0)
                                                <button data-toggle="modal" data-target="#DeliverySelectedHide"
                                                    class="btn btn-info">{{ $total }}</button>
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td>

                                            @if ($Edit == $i->id)
                                                <input wire:model='MaxValue' type="text" class="form-control"
                                                    style="max-width: 100px;">
                                                <br />
                                                <button wire:click='ChangeMax({{ $i->id }})'
                                                    class="btn btn-info">حفظ</button>

                                            @else
                                                <button wire:click='EnbleEditMax({{ $i->id }})'
                                                    class="btn btn-success">
                                                    {{ $i->max_value }}
                                                </button>

                                            @endif

                                        </td>

                                        <td>
                                            @if ($i->stuts == 1)
                                                <button wire:click='ActiveClint({{ $i->id }})'
                                                    class="btn btn-info">نشـط</button>
                                            @else
                                                <button wire:click='DisActiveClint({{ $i->id }})'
                                                    class="btn btn-wiring">غير
                                                    نشط</button>
                                            @endif
                                        </td>

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


<form wire:submit.prevent action="/">
    <div wire:ignore.self class="modal fade" id="DeliverySelectedHide">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button class="close col-md-2" data-dismiss="modal">x</button>

                    <h4 class="modal-title col-md-4">تحصيل مناديب التوصيل</h4>

                </div>
                <div class="modal-body">
                    <h3>Hello</h3>
                </div>
            </div>
        </div>
    </div>
</form>

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

</style>
