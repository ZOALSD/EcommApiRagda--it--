<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Http\Controllers\Controller;

class Dashboard extends Controller {

	public function home() {
		//$user = Admin::where('id',2);
		$users = Admin::permission(['edit ','delete ','publish '])->get(); // Returns only users with the permission 'edit articles' (inherited or directly)

		//$v= $user->hasPermissionTo('publish', 'admin');

		return view('admin.home', ['title' => trans('admin.dashboard')],\compact('users'));
	}

	public function theme($id) {
		if (session()->has('theme')) {
			session()   ->forget('theme');
		}
		session()->put('theme', $id);
	}
}