<?php

namespace App\Http\Livewire;

use App\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Hash;


class MangerController extends Component
{

    public $manger ;
    public $idd;
    public $role;
    public $role_selected_name;
    public $admin_name;
    public $admin_Role_up;
    public $admin_id;

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
          'phone' => 'nullable',

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
            'phone' => $this->phone,
        ]);
        $user->assignRole($this->role_name);
$this->filedReset();
$this->emit('Add_Admin', $this->idd );

session()->flash('message', 'تــم إضــافة المشرف بنجـــاح');


    }

    public function adminRoleSelect($id,$email){
        
        $this->role_selected_name = Role::where('id',$id)->value('name');

        $e = $email;
        $this->admin_id = Admin::where('email',$e)->value('id');
        $this->admin_name = Admin::where('email',$e)->value('name');

    }

    public function saveAdminRole(){

        $admin = Admin::where('id',$this->admin_id)->first();//syncRoles([$this->role_selected_name]);
        $admin->removeRole($this->role_selected_name);
        //$admin->syncRoles([$this->admin_Role_up]);
        if($this->admin_Role_up == null){
            $role = $this->role_selected_name;
        }else{
            $role = $this->admin_Role_up;
        }
       $admin->assignRole($role);

        $this->emit('Change_Role');
        session()->flash('message', 'تــم تغير دور المشرف بنجـــاح');

        
        
    }
}