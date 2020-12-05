<div class="manger">

@if(session()->has('message'))
<div wire:poll.3000ms class="alert alert-success" role="alert">
  <p>
    {{ session('message') }}
  </p>
</div>
@endif


<button data-toggle="modal" data-target="#Add_Admin" class="btn btn-success">إضــافة</button>
<br>
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

    @foreach ($manger as $i)
    
         
    <tr>
        <td>{{ $i->name }}</td>
        <td>{{ $i->email }}</td>
        <td>phone</td>
        <td>
            @foreach ($i->roles as $r)
                <button class="btn btn-success" data-toggle="modal" data-target="#Change_Role">
                        {{ $r->name }}</button>
            @endforeach
        </td>
        <td>
            <button  data-toggle="modal" data-target="#delete_record{{$i->id}}" 
            class="btn btn-danger" >حذف</button>
        </td>
        <td>

        </td>
    </tr>

    <div class="modal fade" id="delete_record{{$i->id}}">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button class="close" data-dismiss="modal">x</button>
                                <h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
                        </div>
                        <div class="modal-body">
                                <i class="fa fa-exclamation-triangle"></i> هـل انـت متأكــيد مــن حـــذفـ المـشرف ؟ <i class="wirring">{{ $i->name }}</i>
                        </div>
                        
                        <div class="modal-footer">
                                <button wire:click="deleteAdmin({{ $i->id }})" class="btn btn-danger">حذف</button>                          
                                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                        </div>
                </div> 
               
        </div>
</div>


    @endforeach
   <form wire:submit.prevent  action="/">
    <div wire:ignore.self class="modal fade" id="Add_Admin">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button class="close" data-dismiss="modal">x</button>
                                <h4 class="modal-title">إضــافة مشرف جـديد</h4>
                        </div>
                        <div class="modal-body">

                            <input wire:model.lazy="name" type="text" class="form-control" placeholder="إسم المشرف" name="name" id="">
                            @error('name') <div class="error">{{ $message }}</div> @enderror

                            <br>
                             <input wire:model.lazy="email" type="email" class="form-control" placeholder="البريد الالكتروني" name="email" id="">
                          
                             @error('email') <div class="error">{{ $message }}</div> @enderror


                             <br>
                             <input wire:model.lazy="phone" type="number" class="form-control" placeholder=" رقم الهاتف" name="" id="phone">
                             @error('phone') <div class="error">{{ $message }}</div> @enderror
                            
                             <br>
                             <input wire:model.lazy="password" type="password" class="form-control" placeholder=" كلمة المرور" name="password" id="">
                            
                             @error('password') <div class="error">{{ $message }}</div> @enderror
                             <br>
                             <input wire:model.lazy="password_confirmation" type="password" class="form-control" placeholder="  تأكيد كلمة المرور " name="password_confirmation" id="">
                              <br>
                             <select wire:model.lazy="role_name" name="role_name" id="" class="form-control">
                                 @foreach ($role as $i)
                                 <option value="{{ $i->name }}">{{ $i->name }}</option>
                                 @endforeach
                            
                                </select>
                        </div>
                        
                        <div class="modal-footer">
                                <button wire:click="addAdmin" class="btn btn-danger">إضــافة</button>                          
                                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                        </div>
                </div> 
               
        </div>
</div>
</form>




<form wire:submit.prevent  action="/">
        <div wire:ignore.self class="modal fade" id="Change_Role">
            <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <button class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title"> تغير دور المشرف </h4>
                            </div>
                            <div class="modal-body">
    
                                        {!! Form::select('role_name',Spatie\Permission\Models\Role::pluck('name'),'', ['class' => 'form-control']) !!}
                                  
                                    </select>
                            </div>
                            
                            <div class="modal-footer">
                                    <button wire:click="addAdmin" class="btn btn-danger">إضــافة</button>                          
                                    <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                            </div>
                    </div> 
                   
            </div>
    </div>
    </form>




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
   
    }
</style>
