<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Model\RolePermission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class permissionController extends Controller
{
    
    public function index(){

       // return	Admin::with('roles')->get(); //roles
        return view('admin.permission',['title'=>'صلاحيات المشرفين']);
    }

}