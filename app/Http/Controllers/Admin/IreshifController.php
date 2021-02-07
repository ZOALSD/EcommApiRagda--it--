<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\IreshifDataTable;
use App\Http\Controllers\Controller;
use App\Model\Ireshif;
use Form;
use Illuminate\Http\Request;
use Up;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class IreshifController extends Controller
{

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(IreshifDataTable $ireshif)
    {
        return $ireshif->render('admin.ireshif.index', ['title' => trans('admin.ireshif')]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ireshif.create', ['title' => trans('admin.create')]);
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
            'seller_order_id' => 'required|numeric',
            'invoce_image' => 'required' . it()->image() . '',
        ];
        $data = $this->validate(request(), $rules, [], [
            'seller_order_id' => trans('admin.seller_order_id'),
            'invoce_image' => trans('admin.invoce_image'),
        ]);

        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('invoce_image')) {
            $data['invoce_image'] = it()->upload('invoce_image', 'ireshif');
        }

        Ireshif::create($data);

        session()->flash('success', trans('admin.added'));
        return redirect(aurl('ireshif'));
    }

    /**
     * Display the specified resource.
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ireshif = Ireshif::find($id);
        return view('admin.ireshif.show', ['title' => trans('admin.show'), 'ireshif' => $ireshif]);
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * edit the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ireshif = Ireshif::find($id);
        return view('admin.ireshif.edit', ['title' => trans('admin.edit'), 'ireshif' => $ireshif]);
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
            'seller_order_id' => 'required|numeric',
            'invoce_image' => 'required|' . it()->image() . '',

        ];
        $data = $this->validate(request(), $rules, [], [
            'seller_order_id' => trans('admin.seller_order_id'),
            'invoce_image' => trans('admin.invoce_image'),
        ]);
        $data['admin_id'] = admin()->user()->id;
        if (request()->hasFile('invoce_image')) {
            it()->delete(Ireshif::find($id)->invoce_image);
            $data['invoce_image'] = it()->upload('invoce_image', 'ireshif');
        }
        Ireshif::where('id', $id)->update($data);

        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('ireshif'));
    }

    /**
     * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
     * destroy a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ireshif = Ireshif::find($id);

        it()->delete($ireshif->invoce_image);
        it()->delete('ireshif', $id);

        @$ireshif->delete();
        session()->flash('success', trans('admin.deleted'));
        return back();
    }

    // public function multi_delete(Request $r)
    // {
    //     $data = $r->input('selected_data');
    //     if (is_array($data)) {
    //         foreach ($data as $id) {
    //             $ireshif = Ireshif::find($id);

    //             it()->delete($ireshif->invoce_image);
    //             it()->delete('ireshif', $id);
    //             @$ireshif->delete();
    //         }
    //         session()->flash('success', trans('admin.deleted'));
    //         return back();
    //     } else {
    //         $ireshif = Ireshif::find($data);

    //         it()->delete($ireshif->invoce_image);
    //         it()->delete('ireshif', $data);

    //         @$ireshif->delete();
    //         session()->flash('success', trans('admin.deleted'));
    //         return back();
    //     }
    // }

}
