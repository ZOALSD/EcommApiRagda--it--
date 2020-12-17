<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Ads;
use Validator;
use Set;
use Up;
use Form;


class AdsControllerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */

            public function index(){

            $data = Ads::orderBy('id','desc')->get();
            return response()->json($data);
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
              $data['ad_image'] = it()->upload('ad_image','ads');
              }
        $create = Ads::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added')//,
           // "data"=>$create
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
                $show =  Ads::find($id);
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
              it()->delete(Ads::find($id)->ad_image);
              $data['ad_image'] = it()->upload('ad_image','ads');
               }
              Ads::where('id',$id)->update($data);

              $Ads = Ads::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated')
              // "data"=> $Ads
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
               $ads = Ads::find($id);

               it()->delete($ads->ad_image);
               it()->delete('ads',$id);

               @$ads->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$ads = Ads::find($id);

                    	it()->delete($ads->ad_image);
                    	it()->delete('ads',$id);
                    	@$ads->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $ads = Ads::find($data);
 
                    	it()->delete($ads->ad_image);
                    	it()->delete('ads',$data);

                    @$ads->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}