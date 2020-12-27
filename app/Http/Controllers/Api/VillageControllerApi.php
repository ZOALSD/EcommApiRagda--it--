<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Village;
use Illuminate\Http\Request;
use Up;
use Validator;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class VillageControllerApi extends Controller
{

    /**
     * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "status" => true,
            "data" => Village::orderBy('id', 'desc')->paginate(15),
        ]);
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
            'area_id' => 'required|numeric',
            'village_name' => 'required|string',
        ];
        $data = Validator::make(request()->all(), $rules, [], [
            'area_id' => trans('admin.area_id'),
            'village_name' => trans('admin.village_name'),
        ]);

        if ($data->fails()) {
            return response()->json([
                "status" => false, "
               messages" => $data->messages(),
            ]);
        }
        $data = request()->except(["_token"]);
        $data['user_id'] = auth()->user()->id;
        $create = Village::create($data);

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

        return Village::where('area_id', $id)->get();
        // $show = Village::find($id);
        // return response()->json([
        //     "status" => true,
        //     "data" => $show,
        // ]);
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
            'area_id' => 'required|numeric',
            'village_name' => 'required|string',

        ];
        $data = Validator::make(request()->all(), $rules, [], [
            'area_id' => trans('admin.area_id'),
            'village_name' => trans('admin.village_name'),
        ]);
        if ($data->fails()) {
            return response()->json([
                "status" => false, "
               messages" => $data->messages(),
            ]);
        }
        $data = request()->except(["_token"]);
        $data['user_id'] = auth()->user()->id;
        Village::where('id', $id)->update($data);

        $Village = Village::find($id);

        return response()->json([
            "status" => true,
            "message" => trans('admin.updated'),
            "data" => $Village,
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
        $village = Village::find($id);

        @$village->delete();
        return response(["status" => true, "message" => trans('admin.deleted')]);
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $village = Village::find($id);

                @$village->delete();
            }
            return response(["status" => true, "message" => trans('admin.deleted')]);
        } else {
            $village = Village::find($data);

            @$village->delete();
            return response(["status" => true, "message" => trans('admin.deleted')]);
        }
    }

}
