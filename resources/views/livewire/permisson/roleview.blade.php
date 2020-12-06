<div >

    <h1 style ="color:#da8d1a">
        {{  $bgSeleted  }}
        {{ $namePer }}
    </h1>

    @if(session()->has('old'))
    <div wire:poll.3000ms class="alert alert-wiring" role="alert">
      <p>
        {{ session('old') }}
      </p>
    </div>
    @endif


    @if(session()->has('new'))
    <div wire:poll.3000ms class="alert alert-success" role="alert">
      <p>
        {{ session('new') }}
      </p>
    </div>
    @endif


    @if(session()->has('deleted'))
    <div wire:poll.3000ms class="alert alert-success" role="alert">
      <p>
        {{ session('deleted') }}
      </p>
    </div>
    @endif



<hr style="border-color:#da8d1a">
    <div class="row">
        <div class="col-md-9">
         @foreach ($PermissionRole as $i)
            
            @foreach ($i->permission as $p)
            <li class="list-group-item bg-permission ">
                <i class="fa fa-lock" aria-hidden="true"></i>
                {{ $p->name }}
                   
                &ThinSpace;
                &ThinSpace;
                &ThinSpace;
                <button class="float-left btn" wire:click="removePermission('{{ $p->id }}')">

                    <i  class=" fa fa-trash fa-x" aria-hidden="true"></i>
                </button>
                
            </li>
            @endforeach


            @endforeach
            <hr style="border-color:#da8d1a">
            @foreach ($permission as $i)
                
            
            <li class="list-group-item bg-permission-2">
                <i class="fa fa-lock" aria-hidden="true"></i>

                {{ $i->name }}
                <button wire:click="addPermission({{ $i->id }})" class="btn float-left">
                <i class=" fa fa-plus fa-x " aria-hidden="true"></i>
                </button>
            </li>
            @endforeach

        </div>

        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
    @if ($add)
            <button wire:click='addRole' class="btn btn-success">اضافة</button>
    @endif
    @if ($addNew)
        
    <input wire:model='newRoleValue' type="text" class="form-control">
    <button wire:click='saveRole' class="mt-2 btn btn-info">حفـظ</button>
    @endif

    @if ($EditRoleShow)
        
    <input wire:model='newRoleValue' type="text" class="form-control">
    <button wire:click='editRoleValue' class="mt-2 btn btn-info">حفـظ التعديل</button>
    @endif


</li>
                    @foreach ($role as $i)
                    
                        <li wire:click='roleSelect({{ $i->id }})'  class="list-group-item bg-success">
                           <a>
                               <i wire:click='editRole({{ $i->id }})' class="fa fa-edit "></i>
                           </a>
                           <a>
                               <i class="fa fa-trash" aria-hidden="true"></i>                            
                               
                               {{ $i->name }}
                           </a>
                        </li>
                    

                     @endforeach
                   
                </ul>
            </div>
        </div>

       
    </div>


    
</div>

<style>
    .mt-2 {
        margin-top:2px;
    }
    .float-left{
        float:left !important;
    }
    a:hover{
        text-decoration:none;
    }
    .bg-success:hover{
        background-color:#8e99a1;
        color:#FDD835 !important;
    }

    .bg-permission{
        background-color:#36c6d3;
        color:#ffffff;

    }

    .bg-permission-2{
        background-color:#607D8B;
        color:#ffffff;

    }
    .bg-permission:hover{
        background-color:#12658b;
        color:#FDD835;
        font-size:18px;
    }

    .bg-permission-2:hover{
        background-color:#12658b;
        color:#FDD835;
        font-size:18px;
    }

    .fa{
        color:#FDD835;
    }
    
    .fa-trash{
        color:#5a0202;
    }
</style>
