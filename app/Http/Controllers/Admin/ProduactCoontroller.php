<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ProduactCoontrollerDataTable;
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
class ProduactCoontroller extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ProduactCoontrollerDataTable $produactcoontroller)
            {
               return $produactcoontroller->render('admin.produactcoontroller.index',['title'=>trans('admin.produactcoontroller')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.produactcoontroller.create',['title'=>trans('admin.create')]);
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
             'cate_name'=>'required|string',
             'color_id'=>'numeric|nullable|sometimes',
             'quantity'=>'numeric|nullable|sometimes',
             'size_id'=>'numeric|nullable|sometimes',
             'cate_image'=>''.it()->image().'|nullable|sometimes',
             'cate_disc'=>'nullable|sometimes|string',
             'cate_id'=>'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'cate_name'=>trans('admin.cate_name'),
             'color_id'=>trans('admin.color_id'),
             'quantity'=>trans('admin.quantity'),
             'size_id'=>trans('admin.size_id'),
             'cate_image'=>trans('admin.cate_image'),
             'cate_disc'=>trans('admin.cate_disc'),
             'cate_id'=>trans('admin.cate_id'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('cate_image')){
              $data['cate_image'] = it()->upload('cate_image','produactcoontroller');
              }
              Produact::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('produactcoontroller'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $produactcoontroller =  Produact::find($id);
                return view('admin.produactcoontroller.show',['title'=>trans('admin.show'),'produactcoontroller'=>$produactcoontroller]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $produactcoontroller =  Produact::find($id);
                return view('admin.produactcoontroller.edit',['title'=>trans('admin.edit'),'produactcoontroller'=>$produactcoontroller]);
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
            //  'cate_name'=>'required|string',
            //  'color_id'=>'numeric|nullable|sometimes',
            //  'quantity'=>'numeric|nullable|sometimes',
            //  'size_id'=>'numeric|nullable|sometimes',
              'cate_image'=>''.it()->image().'|nullable|sometimes',
            //  'cate_disc'=>'nullable|sometimes|string',
            //  'cate_id'=>'',

                         ];
             $data = $this->validate(request(),$rules,[],[
            //  'cate_name'=>trans('admin.cate_name'),
            //  'color_id'=>trans('admin.color_id'),
            //  'quantity'=>trans('admin.quantity'),
            //  'size_id'=>trans('admin.size_id'),
             'cate_image'=>trans('admin.cate_image'),
            //  'cate_disc'=>trans('admin.cate_disc'),
            //  'cate_id'=>trans('admin.cate_id'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('cate_image')){
              it()->delete(Produact::find($id)->cate_image);
              
              $data['cate_image'] = it()->upload('cate_image','produactcoontroller');
               }
              Produact::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('produactcoontroller'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $produactcoontroller = Produact::find($data);
 
                    	it()->delete($produactcoontroller->cate_image);
                    	it()->delete('produact',$data);

                    @$produactcoontroller->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}