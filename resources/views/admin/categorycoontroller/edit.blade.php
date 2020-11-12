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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categorycoontroller/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.categorycoontroller')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.categorycoontroller')}}">
												<a data-toggle="modal" data-target="#myModal{{$categorycoontroller->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$categorycoontroller->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$categorycoontroller->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['categorycoontroller.destroy', $categorycoontroller->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categorycoontroller')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.categorycoontroller')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('admin.fullscreen')}}"
												title="{{trans('admin.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">
										
{!! Form::open(['url'=>aurl('/categorycoontroller/'.$categorycoontroller->id),'method'=>'put','id'=>'categorycoontroller','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('cate_name',trans('admin.cate_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('cate_name', $categorycoontroller->cate_name ,['class'=>'form-control','placeholder'=>trans('admin.cate_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('color_id',trans('admin.color_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('color_id',App\Model\Color::pluck("name","id"), $categorycoontroller->color_id ,['class'=>'form-control','placeholder'=>trans('admin.color_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('quantity',trans('admin.quantity'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('quantity', $categorycoontroller->quantity ,['class'=>'form-control','placeholder'=>trans('admin.quantity')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('size_id',trans('admin.size_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('size_id',App\Model\Size::pluck("size_name","id"), $categorycoontroller->size_id ,['class'=>'form-control','placeholder'=>trans('admin.size_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cate_image',trans('admin.cate_image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('cate_image',['class'=>'form-control','placeholder'=>trans('admin.cate_image')]) !!}
        @if(!empty($categorycoontroller->cate_image))
        <img src="{{it()->url($categorycoontroller->cate_image)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cate_disc',trans('admin.cate_disc'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('cate_disc', $categorycoontroller->cate_disc ,['class'=>'form-control','placeholder'=>trans('admin.cate_disc')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cate_id',trans('admin.cate_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('cate_id',App\Model\Categories::pluck("name","id"), $categorycoontroller->cate_id ,['class'=>'form-control','placeholder'=>trans('admin.cate_id')]) !!}
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
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
		
