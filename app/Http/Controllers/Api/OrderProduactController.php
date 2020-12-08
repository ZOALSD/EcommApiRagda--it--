<?php
namespace App\Http\Controllers\Api;
use Up;

use Set;
use Form;
use Validator;
use Carbon\Carbon;
use App\QRCodeOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderProduactController extends Controller
{

            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>QRCodeOrder::where('user_id',Auth::id())->where('stusts',0)->orderBy('id','desc')->get()
               ]);
            }


    public function store()
    {
        $rules = [
            //  //'ad_image'=>'required|'.it()->image().'',
            //  "client_id" => 'nullable', //-- table  "-- QR_code -- Table Value 
            // // "seller_id" => 'required', // -- table  "-- QR_code -- Table Value
            //  "delivery_id" => 'nullable', //-- table  "-- QR_code -- Table Value
            //  "card_process_id" => 'nullable', //-- table  "-- QR_code -- Table Value
            //  "qrcode" => 'nullable',
         //    "stusts" => 'nullable', //end tabel QrCode
             "produact_id" => 'required', // -- table  "-- Crad Table Value
             "seller_id" => 'required', // -- table  "-- Crad Table Value
             "clint_id" => 'required', // -- table  "-- Crad Table Value
             "process_id" => 'required', // -- table  "-- Crad Table Value
             "city_id" => 'nullable', // -- table  "-- Crad Table Value
             "area_id" => 'nullable', // -- table  "-- Crad Table Value
             "quantity" => 'required', // -- table  "-- Crad Table Value
             "price" => 'required', // -- table  "-- Crad Table Value
             "total" => 'nullable', // -- table  "-- Crad Table Value
             "stutus" => 'nullable', // -- table  "-- Crad Table Value
        ];



        $data = Validator::make(request()->all(),$rules,'');
        
        $PID = Card::orderBy('id','desc')->value('process_id')->frist();
        if($PID == null){
                $PIDValue = 1;
        }else{
                $PIDValue = $PID+1;
        }

        $total = $req->quantity * $req->price;
        Card::create([
            
             "produact_id" => $req->produact_id ,//,/// -- table  "-- Crad Table Value
             "seller_id" => $req->seller_id   ,// //, // -- table  "-- Crad Table Value
             "clint_id" => Auth::id(),// //, // -- table  "-- Crad Table Value
             "process_id" => $PIDValue  ,// //, // -- table  "-- Crad Table Value
             "city_id" => $req->city_id   ,// //, // -- table  "-- Crad Table Value
             "area_id" => $req->area_id   ,// //, // -- table  "-- Crad Table Value
             "quantity" => $req->quantity   ,// //, // -- table  "-- Crad Table Value
             "price" => $req->price   ,// //, // -- table  "-- Crad Table Value
             "total" => $total // //, // -- table  "-- Crad Table Value
           //  "stutus" => $req->   ,// //, //

        ]);

        $crpt = Auth::id.$PIDValue ;
        QRCodeOrder::create([
            
            "client_id" => Auth::id(),
            "seller_id" => $req->seller_id,
            "card_process_id" => $PIDValue ,
            "qrcode" => Hash::make($crpt),

        ]);


        


        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('ad_image')){
              $data['ad_image'] = it()->upload('ad_image','QRCodeOrder');
              }
        $create = QRCodeOrder::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

           
            public function show($id)
            {
                $show =  QRCodeOrder::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


          
            public function update($id)
            {
                $rules = [
             'ad_image'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'ad_image'=>trans('admin.ad_image'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('ad_image')){
              it()->delete(QRCodeOrder::find($id)->ad_image);
              $data['ad_image'] = it()->upload('ad_image','QRCodeOrder');
               }
              QRCodeOrder::where('id',$id)->update($data);

              $QRCodeOrder = QRCodeOrder::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $QRCodeOrder
               ]);
            }

         
            public function destroy($id)
            {
               $QRCodeOrder = QRCodeOrder::find($id);
               $QRCodeOrder->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$QRCodeOrder = QRCodeOrder::find($id);

                    	it()->delete($QRCodeOrder->ad_image);
                    	it()->delete('QRCodeOrder',$id);
                    	@$QRCodeOrder->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $QRCodeOrder = QRCodeOrder::find($data);
 
                    	it()->delete($QRCodeOrder->ad_image);
                    	it()->delete('QRCodeOrder',$data);

                    @$QRCodeOrder->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}