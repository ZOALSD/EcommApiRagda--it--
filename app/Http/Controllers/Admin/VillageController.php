<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\VillageDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Village;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class VillageController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(VillageDataTable $village)
            {
               return $village->render('admin.village.index',['title'=>trans('admin.village')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.village.create',['title'=>trans('admin.create')]);
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
             'area_id'=>'required|numeric',
             'village_name'=>'required|string',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'area_id'=>trans('admin.area_id'),
             'village_name'=>trans('admin.village_name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Village::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('village'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $village =  Village::find($id);
                return view('admin.village.show',['title'=>trans('admin.show'),'village'=>$village]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $village =  Village::find($id);
                return view('admin.village.edit',['title'=>trans('admin.edit'),'village'=>$village]);
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
             'area_id'=>'required|numeric',
             'village_name'=>'required|string',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'area_id'=>trans('admin.area_id'),
             'village_name'=>trans('admin.village_name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Village::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('village'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $village = Village::find($id);


               @$village->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$village = Village::find($id);

                    	@$village->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $village = Village::find($data);
 

                    @$village->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}