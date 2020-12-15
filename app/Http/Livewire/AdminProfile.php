<?php

namespace App\Http\Livewire;

use Auth;
use App\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;


class AdminProfile extends Component
{
    public $name;
    public $phone;
    public $email;
    public $OldPassword ;
    public $password ;
    public $password_con ;
    public $EditName = false ;
    public $EditEmail =false ;
    public $EditPhone =false ;
    public $ChangePssword =false ;
    public function render()
    {
         $user = admin()->user();
        return view('livewire.admin-profile',compact('user'));
    }

    public function changeAdminName($id){
        
        Admin::where('id',$id)->update(['name'=>$this->name]);
        $this->EditName = false ;

    }

    public function showEdtingName(){
        $this->EditName = true ;
    }


    public function changeAdminEmail($id){
        Admin::where('id',$id)->update(['email'=>$this->email]);
        $this->EditEmail = false ;
    }
    public function showEdtingُُEmail(){
        $this->EditEmail = true ;
    }


    public function changeAdminPhone($id){
        Admin::where('id',$id)->update(['phone'=>$this->phone]);
        $this->EditPhone = false ;
    }
    public function showEdtingُُPhone(){
        $this->EditPhone = true ;
    }

    public function showEdtingُُPassword(){
             
        $this->ChangePssword = true ;
    }


    public function changeAdminPasswordExit(){//
             
        $this->ChangePssword = false ;
    }

    public function emptyFlied(){
        $this->OldPassword = '' ;
        $this->password = '' ;
        $this->password_con = '' ;
    }

    public function changeAdminPassword($id){

        $admin = Admin::where('id',$id)->first();
    
        if (Hash::check($this->OldPassword, $admin->password)) {
           
            if($this->password == $this->password_con)
            {

                Admin::where('id',$id)->update(['password' => Hash::make($this->password)]);
                session()->flash('message', 'تم تغير كلمة المرور بنجــــاح');
                $this->emptyFlied();
                $this->ChangePssword = false ;

            }else{
                $this->emptyFlied();

            session()->flash('Password', '  كلمة المرور  غير متطابقة');

            }

        }else{
            $this->emptyFlied();

            session()->flash('Password', 'كلمة المرور القديمة غير صحيحة');
        }

    }

}