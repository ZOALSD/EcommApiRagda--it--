@extends('admin.index')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="widget-extra body-req portlet light bordered">
				<div class="portlet-title">
						<div class="caption">
								<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
						</div>
						<div class="actions">
								<a  href="{{aurl('produactcoontroller')}}"
										class="btn btn-circle btn-icon-only btn-default"
										tooltip="{{trans('admin.show_all')}}"
										title="{{trans('admin.show_all')}}">
										<i class="fa fa-list"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen"
										href="#"
										data-original-title="{{trans('admin.fullscreen')}}"
										title="{{trans('admin.fullscreen')}}">
								</a>
						</div>
				</div>
				<div class="portlet-body form">
								<div class="col-md-12">
								
{!! Form::open(['url'=>aurl('/produactcoontroller'),'id'=>'produactcoontroller','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('cate_name',trans('admin.cate_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('cate_name',old('cate_name'),['class'=>'form-control','placeholder'=>trans('admin.cate_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
		{!! Form::label('color_id',trans('admin.color_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('color_id',App\Model\Color::pluck("name","id"),old('color_id'),['class'=>'form-control','placeholder'=>trans('admin.color_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('quantity',trans('admin.quantity'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('quantity',old('quantity'),['class'=>'form-control','placeholder'=>trans('admin.quantity')]) !!}
    </div>
</div>
<br>
<div class="form-group">
		{!! Form::label('size_id',trans('admin.size_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('size_id',App\Model\Size::pluck("size_name","id"),old('size_id'),['class'=>'form-control','placeholder'=>trans('admin.size_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cate_image',trans('admin.cate_image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('cate_image',['class'=>'form-control','placeholder'=>trans('admin.cate_image')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cate_disc',trans('admin.cate_disc'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('cate_disc',old('cate_disc'),['class'=>'form-control','placeholder'=>trans('admin.cate_disc')]) !!}
    </div>
</div>
<br>
<div class="form-group">
		{!! Form::label('cate_id',trans('admin.cate_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('cate_id',App\Model\Categories::pluck("name","id"),old('cate_id'),['class'=>'form-control','placeholder'=>trans('admin.cate_id')]) !!}
		</div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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
	
