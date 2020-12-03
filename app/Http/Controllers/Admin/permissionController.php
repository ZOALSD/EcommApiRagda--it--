<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\RolePermission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class permissionController extends Controller
{
    
    public function index(){

     //   return RolePermission::where('role_id',1)->with('permission')->get();
   //return Role::findByName('writer');

        return view('admin.permission',['title'=>'صلاحيات المشرفين']);
    }

}