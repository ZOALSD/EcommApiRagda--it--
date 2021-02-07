<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('register', 'Api\ClintLoginController@Register');

Route::post('login', 'Api\ClintLoginController@login');
Route::post('login_seller', 'Api\ClintLoginController@login_seller');
Route::post('login_deliver', 'Api\ClintLoginController@login_deliver');

Route::get('produact_search', 'Api\ProduactCoontrollerApi@search');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('OrderNum', 'Api\CardControllerApi@OrderNum');

    Route::get('produact_searchOld', 'Api\ProduactCoontrollerApi@searchNew');

    Route::get('categorise', 'Api\CategoriesControllerApi@index');
    Route::get('SupCategoriseOrData/{id}', 'Api\CategoriesControllerApi@SupCategorise');
    Route::get('CategoryForSeller', 'Api\CategoriesControllerApi@CategoryForSeller');
    //
    Route::get('logout', 'Api\ClintLoginController@logout');
    Route::get('produact', 'Api\ProduactCoontrollerApi@index');

    Route::get('produact/{id}', 'Api\ProduactCoontrollerApi@show');
    Route::delete('deletePro/{id}', 'Api\ProduactCoontrollerApi@destroy');
    // update Produact
    Route::put('UpdatePro/{id}', 'Api\ProduactCoontrollerApi@update');

    Route::get('color', 'Api\ColorControllerApi@index');
    Route::get('size', 'Api\SizeControllerApi@index');

    //For التاجر
    Route::get('ProEcommPused', 'Api\ProduactCoontrollerApi@ProEcommPused'); //ProEcommColor
    Route::get('ProEcommColor', 'Api\ProduactCoontrollerApi@ProEcommColor');
    Route::get('ProEcomm', 'Api\ProduactCoontrollerApi@ProEcomm'); //
    Route::delete('ProEcommDelete/{id}', 'Api\ProduactCoontrollerApi@destroy');
    Route::post('AddProduact', 'Api\ProduactCoontrollerApi@store');

    //AdsControllerApi //ProblemAndIussController //store

    Route::get('ProEcommPused', 'Api\PuseProduactController@ProEcommPused'); //

    Route::get('puse/{id}', 'Api\PuseProduactController@puse');
    Route::get('Unpuse/{id}', 'Api\PuseProduactController@Unpuse');

    Route::get('Ads', 'Api\AdsControllerApi@index');

    Route::post('Problem', 'Api\ProblemAndIussController@store');

    Route::post('UserUpdate', 'Api\ClintLoginController@UserUpdate');
    Route::post('UserData', 'Api\ClintLoginController@UserData');

    //Get Area ----------
    Route::get('area', 'Api\AreaControllerApi@index'); //area
    Route::get('village/{id}', 'Api\VillageControllerApi@show'); //area//
    Route::post('card', 'Api\CardControllerApi@card'); //
    Route::post('cardconfirm', 'Api\CardControllerApi@cardconfirm'); //
    Route::get('cardcancle', 'Api\CardControllerApi@cardcancle'); //
    Route::get('showCard', 'Api\CardControllerApi@showCard');
    Route::get('DeleteProCard/{id}', 'Api\CardControllerApi@DeleteProCard');
    Route::put('EditProCard/{id}', 'Api\CardControllerApi@EditProCard');

    Route::get('ClintProTitelDone', 'Api\ShowClintOrder@OrderAccept');
    Route::get('ClintProTitelWait', 'Api\ShowClintOrder@OrderWaitAccept');
    Route::get('ClintProTitelCanceled', 'Api\ShowClintOrder@ClintProTitelCanceled');
    Route::get('ClintProData/{id}', 'Api\ShowClintOrder@ClintProData');

    Route::get('SellerOrder', 'Api\SellerReqApi@SellerOrder');
    Route::get('SellerOrderDone', 'Api\SellerReqApi@SellerOrderDone');
    Route::get('SellerOrderDetils/{id}', 'Api\SellerReqApi@SellerOrderDetils');
    Route::get('SellerOrderReady/{id}', 'Api\SellerReqApi@SellerDoneOrder'); //

    Route::get('DeliverOrder', 'Api\DeliveryReqApi@DeliverOrder');
    Route::get('DeliverOrderDone', 'Api\DeliveryReqApi@DeliverOrderDone');
    Route::get('DeliverOrderDeliveredDone', 'Api\DeliveryReqApi@DeliverOrderDeliveredDone'); //
    Route::get('DeliverOrderDetils/{id}', 'Api\DeliveryReqApi@DeliverOrderDetils');

    Route::post('ScanfromSeller/{qu}', 'Api\CodeScanContrller@ScanfromSeller');
    Route::get('ScanfromClint/{qu}', 'Api\CodeScanContrller@ScanfromClint');

    //Report For Seller ReportForSeller
    Route::get('ReportSeller', 'Api\ReportForSeller@Report');
    Route::get('ReportSellerDetils/{id}', 'Api\ReportForSeller@ReportDetils');
    Route::get('ReportDetilsTotaltele/{id}', 'Api\ReportForSeller@ReportDetilsTotal'); //

    //Report Via Time For  Seller

    Route::get('ReportViaDay', 'Api\ReportForSellerViaTimeController@ViaDay');
    Route::get('ReportViaMonth', 'Api\ReportForSellerViaTimeController@ViaMonth');
    Route::get('ReportViaYear', 'Api\ReportForSellerViaTimeController@ViaYear');

    //Produact Top Request ===
    Route::get('TopRequestPro', 'Api\ProduactTopRequestController@top');

    ///Stutus
    Route::get('OrderStutus', 'Api\OrderStutusController@Stutus');
    //Selller Notiy
    Route::get('SellerNotify', 'Api\Notification\SellerNotificationContoller@notify');
    Route::get('DeliverNotify', 'Api\Notification\DeliveryNotificationContoller@notify');

    //
});
