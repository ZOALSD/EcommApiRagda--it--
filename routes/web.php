<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('qr-code', function () 
{
  $pig = QRCode::text('QR Code Generator for Laravel!')->png();   
   
});

Route::get('qr-code/examples/wifi', function () 
{
    $authenticationType = "WPA";
    $ssId = "ZOOLS3D";
    $ssIdisHidden = false;
    $password = "ZOOL@777";
  
    return QRCode::wifi($authenticationType, $ssId, $password, $ssIdisHidden)
              ->setOutfile('QRcode/my-wii.png')
              ->png();
}); 

Route::get('QRCode', function () 
{
    $q="ZOOLSD";
      //save qrcode image in our folder on this site
      $file = 'generated_qrcodes/'.$q.'.png'; 
      $newQrcode = QRCode::text()
       ->setSize(8)
       ->setMargin(2)
       ->setOutfile($file)
       ->png();
});    