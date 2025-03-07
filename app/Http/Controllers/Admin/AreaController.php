<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AreaDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Area;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class AreaController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(AreaDataTable $area)
            {
               return $area->render('admin.area.index',['title'=>trans('admin.area')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.area.create',['title'=>trans('admin.create')]);
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
             'area_name'=>'required|string',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'area_name'=>trans('admin.area_name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Area::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('area'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $area =  Area::find($id);
                return view('admin.area.show',['title'=>trans('admin.show'),'area'=>$area]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $area =  Area::find($id);
                return view('admin.area.edit',['title'=>trans('admin.edit'),'area'=>$area]);
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
             'area_name'=>'required|string',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'area_name'=>trans('admin.area_name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Area::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('area'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $area = Area::find($id);


               @$area->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$area = Area::find($id);

                    	@$area->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $area = Area::find($data);
 

                    @$area->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}