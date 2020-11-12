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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('produactcoontroller/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.produactcoontroller')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.produactcoontroller')}}">

                        <a data-toggle="modal" data-target="#myModal{{$produactcoontroller->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
                        <i class="fa fa-trash"></i>
                        </a>
                        </span>


<div class="modal fade" id="myModal{{$produactcoontroller->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
            </div>
            <div class="modal-body">
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$produactcoontroller->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['produactcoontroller.destroy', $produactcoontroller->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/produactcoontroller')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.produactcoontroller')}}">
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
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$produactcoontroller->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.admin_id')}} :</b>
 {{ App\Admin::find($produactcoontroller->admin_id)->name }}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.color_id')}} :</b>
 {!! $produactcoontroller->color_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.size_id')}} :</b>
 {!! $produactcoontroller->size_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cate_id')}} :</b>
 {!! $produactcoontroller->cate_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cate_name')}} :</b>
 {!! $produactcoontroller->cate_name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.color_id')}} :</b>
 {!! $produactcoontroller->color_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.quantity')}} :</b>
 {!! $produactcoontroller->quantity !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.size_id')}} :</b>
 {!! $produactcoontroller->size_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cate_image')}} :</b>
 {!! $produactcoontroller->cate_image !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cate_disc')}} :</b>
 {!! $produactcoontroller->cate_disc !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cate_id')}} :</b>
 {!! $produactcoontroller->cate_id !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop