<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\QRCodeOrder;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;


class Dashboard extends Controller {

	public function home() {
		//$user = Admin::where('id',2);
		//$users = Admin::permission(['تعديل'])->get(); // Returns only users with the permission 'edit articles' (inherited or directly)

		//$v= $user->hasPermissionTo('publish', 'admin');
		//Toastr::info('تم حذف المشرف بنجاح','',["positionClass" => "toast-bottom-left"]);

		$orderCount = QRCodeOrder::where('stusts',0)->count();
        $orderData  = QRCodeOrder::where('stusts',0)->get();

		return view('admin.home', ['title' => trans('admin.dashboard')],\compact('orderCount'));
	}

	// public function theme($id) {
	// 	if (session()->has('theme')) {
	// 		session()->forget('theme');
	// 	}
	// 	session()->put('theme', $id);
	// }
}