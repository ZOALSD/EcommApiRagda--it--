<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Produact;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ProduactCoontrollerApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */

             public function search(Request $request){
                 
               //$Produact = Produact::get();
                $Produact = Produact::search($request->get('search'))->get();	

                return $Produact;

             }
             public function ProEcommSearch(){
                $Produact = Produact::search($request->get('search'))->get();	

                return $Produact;

             }

             public function ProEcomm(){
                 $id = auth()->user()->id; 
                $Produact = Produact::where('user_id',$id)->get();	

                return $Produact;

             }

            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Produact::orderBy('id','desc')->get()//paginate(15)
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
             'cate_name'=>'required|string',
             'color_name'=>'string|nullable|sometimes',
             'price'=>'numeric|nullable|sometimes',
             'size_id'=>'numeric|nullable|sometimes',
             'cate_image'=>''.it()->image().'|nullable|sometimes',
             'cate_disc'=>'nullable|sometimes|string',
             'cate_id'=>'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
             'cate_name'=>trans('admin.cate_name'),
             'color_id'=>trans('admin.color_id'),
             'price'=>trans('admin.price'),
             'size_id'=>trans('admin.size_id'),
             'cate_image'=>trans('admin.cate_image'),
             'cate_disc'=>trans('admin.cate_disc'),
             'cate_id'=>trans('admin.cate_id'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('cate_image')){
              $data['cate_image'] = it()->upload('cate_image','produactcoontroller');
              }
        $create = Produact::create($data); 

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
            
            $p = Produact::where('id',$id)->value('request') + 1;
             Produact::where('id',$id)->update('request',$p);
              $show =  Produact::find($id);
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
             'cate_name'=>'required|string',
             'color_id'=>'numeric|nullable|sometimes',
             'price'=>'numeric|nullable|sometimes',
             'size_id'=>'numeric|nullable|sometimes',
             'cate_image'=>''.it()->image().'|nullable|sometimes',
             'cate_disc'=>'nullable|sometimes|string',
             'cate_id'=>'',
                         ];

             $data = Validator::make(request()->all(),$rules,[],[
             'cate_name'=>trans('admin.cate_name'),
             'color_id'=>trans('admin.color_id'),
             'price'=>trans('admin.price'),
             'size_id'=>trans('admin.size_id'),
             'cate_image'=>trans('admin.cate_image'),
             'cate_disc'=>trans('admin.cate_disc'),
             'cate_id'=>trans('admin.cate_id'),
                   ]);
                   
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('cate_image')){
              it()->delete(Produact::find($id)->cate_image);
              $data['cate_image'] = it()->upload('cate_image','produactcoontroller');
               }
              Produact::where('id',$id)->update($data);

              $Produact = Produact::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Produact
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
               $produactcoontroller = Produact::find($id);

               it()->delete($produactcoontroller->cate_image);
               it()->delete('produact',$id);

               @$produactcoontroller->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$produactcoontroller = Produact::find($id);

                    	it()->delete($produactcoontroller->cate_image);
                    	it()->delete('produact',$id);
                    	@$produactcoontroller->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $produactcoontroller = Produact::find($data);
 
                    	it()->delete($produactcoontroller->cate_image);
                    	it()->delete('produact',$data);

                    @$produactcoontroller->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}