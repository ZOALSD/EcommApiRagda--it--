<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Produact;
use Illuminate\Http\Request;
use Up;
use Validator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class CategoriesControllerApi extends Controller
{
    /**
     * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */

    public function CategoryForSeller()
    {
        $Cate = Categories::where('has_parent', null)->select(['id', 'name', 'image_cate'])->get();
        return response()->json($Cate, 200);

    }

    public function index()
    {

        return Categories::where('Parent_id', null)->select(['id', 'name', 'image_cate'])->get(); //

        //:orderBy('id','desc')->paginate(15);
        // return  CategoriseResources::collection($data);
        //    return response()->json([
        //    "status"=>true,
        //    "data"=>Categories::orderBy('id','desc')->paginate(15)
        //    ]);

    }

    //reTurn Categorise OR Data
    public function SupCategorise($id)
    {
        $count = Categories::where('Parent_id', $id)->count();

        if ($count == 0) {
            $data = Produact::where('stutus', 1)->where('stutus_admin', 1)->where('cate_id', $id)->get();
            return response()->json(["Data" => $data, "Sup" => 0], 200);
        } else {

            $Sup = Categories::where('Parent_id', $id)->select(['id', 'name', 'image_cate'])->get();
            $cate = Categories::where('id', $id)->select(['id', 'name', 'image_cate'])->get();
            return response()->json(["Categorise" => $cate, "Sup" => $Sup], 200);

        }

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
            'Parent_id' => 'numeric|nullable',
            'name' => 'required|string',
        ];
        $data = Validator::make(request()->all(), $rules, [], [
            'Parent_id' => trans('admin.Parent_id'),
            'name' => trans('admin.name'),
        ]);

        if ($data->fails()) {
            return response()->json([
                "status" => false, "
               messages" => $data->messages(),
            ]);
        }
        $data = request()->except(["_token"]);
        $data['user_id'] = auth()->user()->id;
        $create = Categories::create($data);

        return response()->json([
            "status" => true,
            "message" => trans('admin.added'),
            "data" => $create,
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
        $show = Categories::find($id);
        return response()->json([
            "status" => true,
            "data" => $show,
        ]);
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
            'Parent_id' => 'numeric|nullable',
            'name' => 'required|string',

        ];
        $data = Validator::make(request()->all(), $rules, [], [
            'Parent_id' => trans('admin.Parent_id'),
            'name' => trans('admin.name'),
        ]);
        if ($data->fails()) {
            return response()->json([
                "status" => false, "
               messages" => $data->messages(),
            ]);
        }
        $data = request()->except(["_token"]);
        $data['user_id'] = auth()->user()->id;
        Categories::where('id', $id)->update($data);

        $Categories = Categories::find($id);

        return response()->json([
            "status" => true,
            "message" => trans('admin.updated'),
            "data" => $Categories,
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
        $categories = Categories::find($id);

        @$categories->delete();
        return response(["status" => true, "message" => trans('admin.deleted')]);
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $categories = Categories::find($id);

                @$categories->delete();
            }
            return response(["status" => true, "message" => trans('admin.deleted')]);
        } else {
            $categories = Categories::find($data);

            @$categories->delete();
            return response(["status" => true, "message" => trans('admin.deleted')]);
        }
    }

}
