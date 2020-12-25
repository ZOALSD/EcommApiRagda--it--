@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget-extra body-req portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="uppercase caption-subject bold font-dark">{{ $title }}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ aurl('produactcoontroller/create') }}"
                            data-toggle="tooltip"
                            title="{{ trans('admin.add') }}  {{ trans('admin.produactcoontroller') }}">
                            <i class="fa fa-plus"></i>
                        </a>
                        <span data-toggle="tooltip"
                            title="{{ trans('admin.delete') }}  {{ trans('admin.produactcoontroller') }}">
                            <a data-toggle="modal" data-target="#myModal{{ $produactcoontroller->id }}"
                                class="btn btn-circle btn-icon-only btn-default" href="">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $produactcoontroller->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">{{ trans('admin.delete') }}؟</h4>
                                    </div>
                                    <div class="modal-body">
                                        <i class="fa fa-exclamation-triangle"></i> {{ trans('admin.ask_del') }}
                                        {{ trans('admin.id') }} ({{ $produactcoontroller->id }}) ؟
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['produactcoontroller.destroy', $produactcoontroller->id],
                                        ]) !!}
                                        {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">{{ trans('admin.cancel') }}</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ aurl('produactcoontroller') }}"
                            data-toggle="tooltip"
                            title="{{ trans('admin.show_all') }}   {{ trans('admin.produactcoontroller') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
                            data-original-title="{{ trans('admin.fullscreen') }}" title="{{ trans('admin.fullscreen') }}">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="col-md-12">

                        {!! Form::open([
                        'url' => aurl('/produactcoontroller/' . $produactcoontroller->id),
                        'method' => 'put',
                        'id' => 'produactcoontroller',
                        'files' => true,
                        'class' => 'form-horizontal
                        form-row-seperated',
                        ]) !!}
                        <div class="form-group">
                            {!! Form::label('cate_name', trans('admin.cate_name'), ['class' => 'col-md-3 control-label'])
                            !!}
                            <div class="col-md-9">
                                {!! Form::text('cate_name', $produactcoontroller->cate_name, ['class' => 'form-control',
                                'placeholder' => trans('admin.cate_name'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('color_id', trans('admin.color_id'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('color_name', $produactcoontroller->color_name, ['class' => 'form-control',
                                'placeholder' => trans('admin.color_id'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('quantity', trans('admin.quantity'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('quantity', $produactcoontroller->quantity, ['class' => 'form-control',
                                'placeholder' => trans('admin.quantity'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('size_id', trans('admin.size_id'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('size_id', App\Model\Size::pluck('size_name', 'id'),
                                $produactcoontroller->size_id, ['class' => 'form-control', 'placeholder' =>
                                trans('admin.size_id'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('cate_disc', trans('admin.cate_disc'), ['class' => 'col-md-3 control-label'])
                            !!}
                            <div class="col-md-9">
                                {!! Form::textarea('cate_disc', $produactcoontroller->cate_disc, ['class' => 'form-control',
                                'placeholder' => trans('admin.cate_disc'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>


                        <div class="form-group">
                            {!! Form::label('prod_stuts', trans('admin.prod_stuts'), ['class' => 'col-md-3 control-label'])
                            !!}
                            <div class="col-md-9">
                                @php
                                if($produactcoontroller->stutus == 1){

                                $stuts = 'متــاح';
                                }else {

                                $stuts = 'مجمد';
                                }
                                @endphp

                                {!! Form::text('prod_stuts', $stuts, ['class' => 'form-control', 'placeholder' =>
                                trans('admin.prod_stuts'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('cate_id', trans('admin.cate_id'), ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::select('cate_id', App\Model\Categories::pluck('name', 'id'),
                                $produactcoontroller->cate_id, ['class' => 'form-control', 'placeholder' =>
                                trans('admin.cate_id'), 'disabled']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('cate_image', trans('admin.cate_image'), ['class' => 'col-md-3 control-label'])
                            !!}
                            <div class="col-md-9">
                                {!! Form::file('cate_image', ['class' => 'form-control', 'placeholder' =>
                                trans('admin.cate_image')]) !!}
                                @if (!empty($produactcoontroller->cate_image))
                                    <img src="{{ it()->url($produactcoontroller->cate_image) }}"
                                        style="width:150px;height:150px;" />
                                @endif
                            </div>
                        </div>

                        <br>

                        <div class="form-group">
                            {!! Form::label('stutus_admin', trans('admin.stutus_admin'), [
                            'class' => 'col-md-3
                            control-label',
                            ]) !!}
                            <div class="col-md-9">
                                @php
                                $stutus_admin =
                                array(
                                1 => 'متــاح' ,
                                2 => 'غير متاح'
                                );
                                @endphp

                                {!! Form::select('stutus_admin', $stutus_admin, $produactcoontroller->stutus_admin, ['class'
                                => 'form-control', 'placeholder' => trans('admin.stutus_admin')]) !!}
                            </div>
                        </div>

                        <br>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            {!! Form::submit(trans('admin.save'), ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop
