<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ProduactCoontrollerDataTable;
use App\Http\Controllers\Controller;
use App\Model\Produact;
use Form;
use Illuminate\Http\Request;
use Up;

class ProduactCoontroller extends Controller
{

    //   public function __construct()
    // {
    //   //  $this->middleware(['permission:ProImageChange']);
    // }

    public function index(ProduactCoontrollerDataTable $produactcoontroller)
    {
        // admin()->user()->with('permission');
        //  $user->givePermissionTo('read');
        return $produactcoontroller->render('admin.produactcoontroller.index', ['title' => trans('admin.produactcoontroller')]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produactcoontroller.create', ['title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'cate_name' => 'required|string',
            'color_id' => 'numeric|nullable|sometimes',
            'quantity' => 'numeric|nullable|sometimes',
            'size_id' => 'numeric|nullable|sometimes',
            'cate_image' => '' . it()->image() . '|nullable|sometimes',
            'cate_disc' => 'nullable|sometimes|string',
            'cate_id' => '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'cate_name' => trans('admin.cate_name'),
            'color_id' => trans('admin.color_id'),
            'quantity' => trans('admin.quantity'),
            'size_id' => trans('admin.size_id'),
            'cate_image' => trans('admin.cate_image'),
            'cate_disc' => trans('admin.cate_disc'),
            'cate_id' => trans('admin.cate_id'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('cate_image')) {
            $data['cate_image'] = it()->upload('cate_image', 'produactcoontroller');
        }
        Produact::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('produactcoontroller'));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produactcoontroller = Produact::find($id);
        return view('admin.produactcoontroller.show', ['title' => trans('admin.show'), 'produactcoontroller' => $produactcoontroller]);
    }

    /**
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(['permission:ProImageChange']);

        $produactcoontroller = Produact::find($id);
        return view('admin.produactcoontroller.edit', ['title' => trans('admin.edit'), 'produactcoontroller' => $produactcoontroller]);
    }

    /**
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
            'cate_image' => '' . it()->image() . '|nullable|sometimes',
            'stutus_admin' => 'numeric|nullable|sometimes',
            //  'cate_disc'=>'nullable|sometimes|string',
            //  'cate_id'=>'',

        ];
        $data = $this->validate(request(), $rules, [], [
            //  'cate_name'=>trans('admin.cate_name'),
            //  'color_id'=>trans('admin.color_id'),
            //  'quantity'=>trans('admin.quantity'),
            //  'size_id'=>trans('admin.size_id'),
            'cate_image' => trans('admin.cate_image'),
            //  'cate_disc'=>trans('admin.cate_disc'),
            //  'cate_id'=>trans('admin.cate_id'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('cate_image')) {
            it()->delete(Produact::find($id)->cate_image);

            $data['cate_image'] = it()->upload('cate_image', 'produactcoontroller');
        }
        Produact::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('produactcoontroller'));
    }

    /**
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produactcoontroller = Produact::find($id);

        it()->delete($produactcoontroller->cate_image);
        it()->delete('produact', $id);

        @$produactcoontroller->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    /*    public function multi_delete(Request $r)
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
}*/

}
