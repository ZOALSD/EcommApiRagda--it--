<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Ireshif;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class IreshifControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Ireshif::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'seller_order_id|App\Model\SellerOrder::pluck('id')'=>'required|numeric',
             'invoce_image'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'seller_order_id|App\Model\SellerOrder::pluck('id')'=>trans('admin.seller_order_id|App\Model\SellerOrder::pluck('id')'),
             'invoce_image'=>trans('admin.invoce_image'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('invoce_image')){
              $data['invoce_image'] = it()->upload('invoce_image','ireshif');
              }
        $create = Ireshif::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Ireshif::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'seller_order_id|App\Model\SellerOrder::pluck('id')'=>'required|numeric',
             'invoce_image'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'seller_order_id|App\Model\SellerOrder::pluck('id')'=>trans('admin.seller_order_id|App\Model\SellerOrder::pluck('id')'),
             'invoce_image'=>trans('admin.invoce_image'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('invoce_image')){
              it()->delete(Ireshif::find($id)->invoce_image);
              $data['invoce_image'] = it()->upload('invoce_image','ireshif');
               }
              Ireshif::where('id',$id)->update($data);

              $Ireshif = Ireshif::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Ireshif
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $ireshif = Ireshif::find($id);

               it()->delete($ireshif->invoce_image);
               it()->delete('ireshif',$id);

               @$ireshif->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$ireshif = Ireshif::find($id);

                    	it()->delete($ireshif->invoce_image);
                    	it()->delete('ireshif',$id);
                    	@$ireshif->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $ireshif = Ireshif::find($data);
 
                    	it()->delete($ireshif->invoce_image);
                    	it()->delete('ireshif',$data);

                    @$ireshif->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}