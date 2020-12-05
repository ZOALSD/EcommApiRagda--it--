
<button class="float-left btn btn-success" wire:click='removeAdmin'>اضافة {{ $add }}</button>
<div class="manger">
  
    
    
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
                <button wire:click="deleteAdmin({{ $i->id }})">DeleteAdmin</button>
            </td>
            <td>

            </td>
        </tr>

       
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