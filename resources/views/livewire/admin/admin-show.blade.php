
<button class="float-left btn btn-success" wire:click='removeAdmin'>اضافة {{ $add }}</button>
<div class="manger">
  
    <button wire:click="destroy({{3}})" class="btn btn-danger">Delete</button>

    <table class="table table-hover table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>رقم الهاتف</th>
                <th>الصلاحيات</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody>
        @foreach ($admins as $i)
            
        <tr>
            <td>{{ $i->name }}</td>
            <td>{{ $i->email }}</td>
            <td>phone</td>
            <td>
            </td>
            <td>
                <button data-toggle="modal" data-target="#delete_record{{$i->id}}" class="btn btn-danger">حذف</button>
            </td>
        </tr>

        <div class="modal fade" id="delete_record{{$i->id}}">
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">{{trans('admin.delete')}} المشرف ؟ {{$i->name  }}</h4>
                            </div>
                            <div class="modal-body">
                                    <i class="fa fa-exclamation-triangle"></i> {{trans('admin.ask_del')}} {{trans('admin.id')}}  ؟
                            </div>
                            <div class="modal-footer">
                                    
                                    <button  class="btn btn-danger">حـذف</button>
                                    <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                            </div>
                    </div>
            </div>
        </div>
        @endforeach
            </tbody>
    </table>

</div>



<style>
    .manger{
        background-color:white;
        padding:20px
    }
    .float-left{
        float:left;
        margin:5px;
    }
</style>