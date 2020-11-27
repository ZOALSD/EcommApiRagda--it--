<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
		return 'admin';
	});

\L::Panel(app('admin'));/// Set Lang redirect to admin
\L::LangNonymous();// Run Route Lang 'namespace' => 'Admin',

//Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
	Route::group(['middleware' => 'Lang'], function () {

		Route::get('theme/{id}', 'Admin\Dashboard@theme');
		Route::group(['middleware' => 'admin_guest'], function () {

				Route::get('login', 'Admin\AdminAuthenticated@login_page');
				Route::post('login', 'Admin\AdminAuthenticated@login_post');
				Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
				Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
				Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
			});
		/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

		Route::group(['middleware' => 'admin:admin'], function () {
				//////// Admin Routes /* Start */ //////////////
				Route::get('/', 'Admin\Dashboard@home');
				Route::any('logout', 'Admin\AdminAuthenticated@logout');

				Route::get('account', 'Admin\AdminAuthenticated@account');
				Route::post('account', 'Admin\AdminAuthenticated@account_post');
				Route::resource('settings', 'Admin\Settings');

				Route::resource('categories','Admin\CategoriesController'); 
Route::post('categories/multi_delete','Admin\CategoriesController@multi_delete'); 
				Route::resource('color','Admin\ColorController'); 
Route::post('color/multi_delete','Admin\ColorController@multi_delete'); 
				Route::resource('size','Admin\SizeController'); 
Route::post('size/multi_delete','Admin\SizeController@multi_delete'); 
				Route::resource('produactcoontroller','Admin\ProduactCoontroller'); 
Route::post('produactcoontroller/multi_delete','Admin\ProduactCoontroller@multi_delete'); 

Route::any('category',function(){
	return view('livewire.categorise');
});
				Route::resource('ads','Admin\AdsController'); 
Route::post('ads/multi_delete','Admin\AdsController@multi_delete'); 
				//////// Admin Routes /* End */ //////////////
			});

	});