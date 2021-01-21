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

                        <a href="{{ url('sellerPdf') }}" class="btn btn-info" target="_blank">طباعة</a>
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
                                    <th> الحالة</th>
                                    <th> النسبة</th>
                                    <th> تاريخ التسجيل</th>
                                </tr>

                                @foreach ($clintsData as $i)
                                    <tr class="inner">
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>{{ $i->phone }}</td>
                                        <td>
                                            @if ($i->stuts == 1)
                                                <button wire:click='ActiveClint({{ $i->id }})'
                                                    class="btn btn-info">نشـط</button>
                                            @else
                                                <button wire:click='DisActiveClint({{ $i->id }})'
                                                    class="btn btn-wiring">غير نشط</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($IdEdit == $i->id)

                                                <input wire:keydown.enter='ChangePercent({{ $i->id }})'
                                                    wire:model='PercentValue' type="number" class="percent-input"
                                                    placeholder="{{ $i->clint_perce }}" max=100>
                                            @else
                                                <button wire:click='EnblePercentEdit({{ $i->id }})'
                                                    class="btn btn-scandary ">{{ $i->clint_perce . '%' }}</button>
                                            @endif

                                        </td>
                                        <td>{{ $i->created_at->format('Y/m/d') }}</td>


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


{{-- <form wire:submit.prevent action="/">
    <div wire:ignore.self class="modal fade" id="ClintPercent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title"> تغير نسبة التاجر {{ $SellerName ?? '' }}
                    </h4>
                </div>
                <div class="modal-body">

                    <input type="number" name="" value="{{ 'j' }}" class="form-control" id="">
                    <br>
                    <button class="btn btn-success"> حــفظ</button>
                </div>

                <div class="modal-footer">
                    <button wire:click="saveAdminRole" class="btn btn-danger">حــفظ</button>
                    <a class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</a>
                </div>
            </div>

        </div>
    </div>
</form> --}}
