<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\DataTables\CategoriesDataTable;
use App\Model\Categories;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class CategoriesController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Categories::where('parent_id', null)->get();

        //  return $categories->render('admin.categories.index',
        //  ['title'=>trans('admin.categories')],compact('parentCategories'));
        return \view('admin.categories.index', ['title' => trans('admin.categories')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', ['title' => trans('admin.create')]);
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
            'Parent_id' => 'numeric|nullable',
            'name' => 'required|string',
            'image_cate' => '' . it()->image() . '|nullable|sometimes', //

        ];
        $data = $this->validate(request(), $rules, [], [
            'Parent_id' => trans('admin.Parent_id'),
            'name' => trans('admin.name'),
            'image_cate' => trans('admin.image_cate'),

        ]);

        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('image_cate')) {
            $data['image_cate'] = it()->upload('image_cate', 'CategoriesImage');
        }

        Categories::create($data);

        //
        if ($data['Parent_id'] != null) {
            Categories::where('id', $data['Parent_id'])
                ->update(['has_parent' => 1]);
        }

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('categories'));

    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::find($id);
        return view('admin.categories.show', ['title' => trans('admin.show'), 'categories' => $categories]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('admin.categories.edit', ['title' => trans('admin.edit'), 'categories' => $categories]);
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
            'Parent_id' => 'numeric|nullable',
            'name' => 'required|string',
            'image_cate' => '' . it()->image() . '|nullable|sometimes', //

        ];
        $data = $this->validate(request(), $rules, [], [
            'Parent_id' => trans('admin.Parent_id'),
            'name' => trans('admin.name'),
            'image_cate' => trans('admin.image_cate'),
        ]);
        $data['admin_id'] = admin()->user()->id;

        if (request()->hasFile('image_cate')) {
            it()->delete(Categories::find($id)->image_cate);
            $data['image_cate'] = it()->upload('image_cate', 'CategoriesImage');
        }

        Categories::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('categories'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);

        @$categories->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $categories = Categories::find($id);

                @$categories->delete();
            }
            session()->flash('success', trans('admin.deleted'));
            return back();
        } else {
            $categories = Categories::find($data);

            @$categories->delete();
            session()->flash('success', trans('admin.deleted'));
            return back();
        }
    }

}
