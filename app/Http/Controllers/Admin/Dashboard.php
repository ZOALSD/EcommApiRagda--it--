<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\QRCodeOrder;
use App\Http\Controllers\Controller;


class Dashboard extends Controller {

	public function home() {
		//$user = Admin::where('id',2);
		//$users = Admin::permission(['تعديل'])->get(); // Returns only users with the permission 'edit articles' (inherited or directly)

		//$v= $user->hasPermissionTo('publish', 'admin');
		//Toastr::info('تم حذف المشرف بنجاح','',["positionClass" => "toast-bottom-left"]);
		 //return Admin::with('permissions')->get();

		return view('admin.home');
		
	}

	// public function theme($id) {
	// 	if (session()->has('theme')) {
	// 		session()->forget('theme');
	// 	}
	// 	session()->put('theme', $id);
	// }
}