<?php
//
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

\L::Panel(app('admin')); /// Set Lang redirect to admin
\L::LangNonymous(); // Run Route Lang 'namespace' => 'Admin',

//Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {
Route::group(['middleware' => 'Lang'], function () {

    Route::get('theme/{id}', 'Admin\Dashboard@theme');
    Route::group(['middleware' => 'admin_guest'], function () {

        Route::get('login', 'Admin\AdminAuthenticated@login_page');
        Route::post('login', 'Admin\AdminAuthenticated@login_post')->name('login');
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

        ///Start PDF

        Route::get('ClintsPdf', 'Report\ClintController@clint')->middleware('permission:print');
        Route::get('sellerPdf', 'Report\ClintController@seller')->middleware('permission:print');
        Route::get('deliverPdf', 'Report\ClintController@deliver')->middleware('permission:print');

        //clint Invice Pdf Report
        Route::get('ClintInvicePdf/{id}', 'Report\ClientInviceController@clint')->name('ClintInvice')->middleware('permission:print');
        Route::get('DeliverInvicePdf/{id}', 'Report\DeliverInviceController@deliver')->name('DeliverInvice')->middleware('permission:print');
        Route::get('SellerInvicePdf/{id}', 'Report\SellerInviceController@Seller')->middleware('permission:print');

        ///end PDf

        //////// Admin Routes /* Start */ //////////////
        Route::get('test', 'Admin\Dashboard@home');
        Route::get('newOrderGet', function () {
            return view('admin.new-order');
        });
        Route::any('logout', 'Admin\AdminAuthenticated@logout');

        Route::get('account', 'Admin\AdminAuthenticated@account');
        Route::post('account', 'Admin\AdminAuthenticated@account_post');
        Route::resource('settings', 'Admin\Settings');

        Route::resource('categories', 'Admin\CategoriesController')->middleware('permission:categor');
        Route::post('categories/multi_delete', 'Admin\CategoriesController@multi_delete')->middleware('permission:categor');
        //  Route::resource('color', 'Admin\ColorController');
        //  Route::post('color/multi_delete', 'Admin\ColorController@multi_delete');
        Route::resource('size', 'Admin\SizeController')->middleware('permission:size'); //===--=::-==---
        Route::post('size/multi_delete', 'Admin\SizeController@multi_delete')->middleware('permission:size');
        Route::resource('produactcoontroller', 'Admin\ProduactCoontroller')->middleware('permission:produact');

        // Route::get('produactcoontroller', 'Admin\ProduactCoontroller@index')->name('produactcoontroller.index')->middleware('permission:produact');
        // Route::get('produactcoontroller/{id}', 'Admin\ProduactCoontroller@show')->name('produactcoontroller.show')->middleware('permission:produact');
        // Route::delete('produactcoontroller/{id}', 'Admin\ProduactCoontroller@destroy')->name('produactcoontroller.destroy')->middleware('permission:ProDelete');
        // Route::get('produactcoontroller/{id}/edit', 'Admin\ProduactCoontroller@edit')->name('produactcoontroller.edit')->middleware('permission:ProImageChange'); //
        // Route::put('produactcoontroller/{id}', 'Admin\ProduactCoontroller@update')->name('produactcoontroller.update')->middleware('permission:produact');
        // Route::get('produactcoontroller/create', 'Admin\ProduactCoontroller@create')->name('produactcoontroller.create')->middleware('permission:produact');

        Route::post('produactcoontroller/multi_delete', 'Admin\ProduactCoontroller@multi_delete')->middleware('permission:produact');

        Route::any('category', function () {
            return view('livewire.categorise');
        })->middleware('permission:categor');
        Route::resource('ads', 'Admin\AdsController')->middleware('permission:ads');
        Route::post('ads/multi_delete', 'Admin\AdsController@multi_delete')->middleware('permission:ads');
        Route::resource('area', 'Admin\AreaController')->middleware('permission:area');
        Route::post('area/multi_delete', 'Admin\AreaController@multi_delete')->middleware('permission:area');
        Route::resource('village', 'Admin\VillageController')->middleware('permission:village');
        Route::post('village/multi_delete', 'Admin\VillageController@multi_delete')->middleware('permission:village');
        //////// Admin Routes /* End */ //////////////

        Route::get('manger', function () {
            return view('admin.admins', ['title' => 'إدارة المشرفين']);
        })->name('manger')->middleware('permission:manager');

        Route::get('permission', 'Admin\permissionController@index')->name('permission')->middleware('permission:permisson');
    });

});
