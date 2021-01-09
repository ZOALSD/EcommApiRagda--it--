@extends('admin.index')
@section('content')


    {{-- <div class="row">
        <div class="col-md-12 col-sm-12"> --}}
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="uppercase caption-subject bold font-dark"> اختار من القائمة </span>
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
                            <div class="col-md-9 col-sm-6">
                                @livewire('request.request-new-order')

                            </div>
                            <div class="col-md-3 col-sm-6">
                                قائمة الطلبات
                                <hr>
                                @livewire('request.silder-request-new-order')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
