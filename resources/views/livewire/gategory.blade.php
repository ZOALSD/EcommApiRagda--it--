<div>
       
    <input wire:model='SearchText' name="" id="" class="" placeholder="بحــــث " type="text" value="">

    <hr>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>اسم التصنيف</th>
                <th>فرع من </th>
                <th>رمز التصنيف</th>
                <th>إدارة</th>
            </tr>
            </thead>
            <tbody>
            @if ($d !== 0)
                
             @foreach ($datase as $i)
                <tr>
                    <td>{{ $i->name }}</td>
                    <td>
                        @php
                           $p = App\Model\Categories::where('id',$i->Parent_id)->value('name');

                           if ($p == null) {
                               $par = "لا يوجد" ;
                           }else{
                               $par = $p;
                           }

                        @endphp

                        {{ $par }}
                    </td>
                    <td>
                       <img width="50px" src="{{ it()->url($i->image_cate) }}" alt="{{ __('') }}">
                    </td>
                <td>

                    <div class="btn-group">
						<a class="btn btn-default btn-outlines btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
								<i class="fa fa-wrench"></i>
						{{ trans('admin.actions') }}
								<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right">
								<li>
										<a href="{{ aurl('/categories/'.$i->id.'/edit')}}"><i class="fa fa-pencil-square-o"></i> {{trans('admin.edit')}}</a>
								</li>
								<li class="divider"> </li>
								<li>
										<a href="{{ aurl('/categories/'.$i->id)}}"><i class="fa fa-eye"></i> {{trans('admin.show')}}</a>
								</li>
								<li>
										<a data-toggle="modal" data-target="#delete_record{{$i->id}}" href="#">
						<i class="fa fa-trash"></i> {{trans('admin.delete')}}</a>
								</li>
						</ul>
				</div>

                </td>
                </tr>

             @endforeach

            </tbody>
    </table>


    <div class="modal fade" id="delete_record{{$i->id}}">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button class="close" data-dismiss="modal">x</button>
                                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                        </div>
                        <div class="modal-body">
                                <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$i->id}}) ؟
                        </div>
                        <div class="modal-footer">
                                {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['categories.destroy', $i->id]
                                ]) !!}
                                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                                {!! Form::close() !!}
                        </div>
                </div>
        </div>
</div>

    {{ $datase->links() }}
    @endif

</div>

