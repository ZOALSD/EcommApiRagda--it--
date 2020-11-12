<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ColorDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Color;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ColorController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ColorDataTable $color)
            {
               return $color->render('admin.color.index',['title'=>trans('admin.color')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.color.create',['title'=>trans('admin.create')]);
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
             'name'=>'required|string',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Color::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('color'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $color =  Color::find($id);
                return view('admin.color.show',['title'=>trans('admin.show'),'color'=>$color]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $color =  Color::find($id);
                return view('admin.color.edit',['title'=>trans('admin.edit'),'color'=>$color]);
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
             'name'=>'required|string',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Color::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('color'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $color = Color::find($id);


               @$color->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$color = Color::find($id);

                    	@$color->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $color = Color::find($data);
 

                    @$color->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}