<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AdsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Ads;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class AdsController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AdsDataTable $ads)
            {
               return $ads->render('admin.ads.index',['title'=>trans('admin.ads')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.ads.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function store()
            {
              $rules = [
             'ad_image'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'ad_image'=>trans('admin.ad_image'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('ad_image')){
              $data['ad_image'] = it()->upload('ad_image','ads');
              }
              Ads::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('ads'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $ads =  Ads::find($id);
                return view('admin.ads.show',['title'=>trans('admin.show'),'ads'=>$ads]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $ads =  Ads::find($id);
                return view('admin.ads.edit',['title'=>trans('admin.edit'),'ads'=>$ads]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'ad_image'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'ad_image'=>trans('admin.ad_image'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('ad_image')){
              it()->delete(Ads::find($id)->ad_image);
              $data['ad_image'] = it()->upload('ad_image','ads');
               }
              Ads::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('ads'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $ads = Ads::find($data);
 
                    	it()->delete($ads->ad_image);
                    	it()->delete('ads',$data);

                    @$ads->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}