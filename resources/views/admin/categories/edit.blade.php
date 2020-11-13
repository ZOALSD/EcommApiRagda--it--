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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categories/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.categories')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.categories')}}">
												<a data-toggle="modal" data-target="#myModal{{$categories->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$categories->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   
																		{{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$categories->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['categories.destroy', $categories->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('categories')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.categories')}}">
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
										
{!! Form::open(['url'=>aurl('/categories/'.$categories->id),'method'=>'put','id'=>'categories','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('Parent_id',trans('admin.Parent_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('Parent_id', $categories->Parent_id ,['class'=>'form-control','placeholder'=>trans('admin.Parent_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $categories->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>




<div class="form-group">
    {!! Form::label('صورة التصنيف',trans('admin.image_cate'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image_cate',['class'=>'form-control','placeholder'=>trans('admin.image_cate')]) !!}
        @if(!empty($CategoriesImage->image_cate))
        <img src="{{it()->url($CategoriesImage->image_cate)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>




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
		
