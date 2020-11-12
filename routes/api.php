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

Route::get('login','Api\ClintLoginController@login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('logout','Api\ClintLoginController@logout');
    Route::get('produact','Api\ProduactCoontrollerApi@index');
    Route::get('produact\{id}','Api\ProduactCoontrollerApi@show');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

});