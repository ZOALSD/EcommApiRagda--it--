<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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





Route::post('register','Api\ClintLoginController@Register');

Route::post('login','Api\ClintLoginController@login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    
    Route::get('produact_search','Api\ProduactCoontrollerApi@search');
    Route::get('categorise','Api\CategoriesControllerApi@index');
    Route::get('logout','Api\ClintLoginController@logout');
    Route::get('produact','Api\ProduactCoontrollerApi@index');
    Route::get('produact\{id}','Api\ProduactCoontrollerApi@show');
    Route::put('UpdatePro\{id}','Api\ProduactCoontrollerApi@update');
    Route::delete('deletePro\{id}','Api\ProduactCoontrollerApi@destroy');




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

});