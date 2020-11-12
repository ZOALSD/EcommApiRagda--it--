<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SizeDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Size;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class SizeController extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SizeDataTable $size)
            {
               return $size->render('admin.size.index',['title'=>trans('admin.size')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.size.create',['title'=>trans('admin.create')]);
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
             'size_name'=>'required|string',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'size_name'=>trans('admin.size_name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Size::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('size'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $size =  Size::find($id);
                return view('admin.size.show',['title'=>trans('admin.show'),'size'=>$size]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $size =  Size::find($id);
                return view('admin.size.edit',['title'=>trans('admin.edit'),'size'=>$size]);
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
             'size_name'=>'required|string',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'size_name'=>trans('admin.size_name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Size::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('size'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $size = Size::find($id);


               @$size->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$size = Size::find($id);

                    	@$size->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $size = Size::find($data);
 

                    @$size->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}