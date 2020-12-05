<?php

namespace App\Http\Livewire;

use App\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class MangerController extends Component
{

    public $manger ;
    public $idd;
    public $role;

    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $role_name;

    protected $rules = [

        'name' => 'required | min:4 | max: 20',
        'email' => 'required|email|unique:admins',
        'password' => 'required| min:4|confirmed',
        //'password_confirmation' => 'required| min:4',
        //'role_id' => 'nullable'
       // 'phone' => 'nullable',

        ];
        
        public function filedReset(){
            
            $this->name =null ;
            $this->email =null ;
            $this->phone =null ;
            $this->password=null ;
            $this->password_confirmation=null ;
            $this->role_id=null ;
        }


    public function render()
    {

        $this->role = Role::get();
        $this->manger = Admin::with('roles')->get(); //roles Admin::with('permissions')->get();
        return view('livewire.manger-controller');
    }

    public function deleteAdmin($id){
        $this->idd = $id;
        
    $this->emit('adminDelete', $this->idd );
       
        Admin::find($this->idd)->delete();
    
    session()->flash('message', 'تــم حــذف المشرف بنجـــاح');
  
    }
   
        
    public function addAdmin(){

        $this->validate();
       
        $user = Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            //'role' => $this->role,
        ]);
        $user->assignRole($this->role_name);
$this->filedReset();
$this->emit('Add_Admin', $this->idd );

session()->flash('message', 'تــم إضــافة المشرف بنجـــاح');


    }
}