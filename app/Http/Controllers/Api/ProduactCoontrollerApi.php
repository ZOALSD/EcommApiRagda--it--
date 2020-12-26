<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduactRequestApi;
use App\Model\Produact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Up;
use \Validator;

class ProduactCoontrollerApi extends Controller
{

    /**
     * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {

        //$Produact = Produact::get();
        $Produact = Produact::search($request->get('search'))->get();

        return $Produact;

    }
    public function ProEcommSearch()
    {
        $Produact = Produact::search($request->get('search'))->get();

        return $Produact;

    }

    public function ProEcomm()
    {
        $id = auth()->user()->id;
        return $Produact = Produact::where('stutus', 1)->where('user_id', $id)->get();

    }

    public function ProEcommColor()
    {
        $id = auth()->user()->id;
        //  $Produact = Produact::where('stutus',1)->where('user_id',$id)->get();
        $color = Produact::where('stutus', 1)->where('user_id', $id)->value('color_name');

        return Str::between($color, '(', ')');

    }

    public function ProEcommPused()
    {
        $id = auth()->user()->id;
        $Produact = Produact::where('stutus', 0)->where('user_id', $id)->get();
        $color = Produact::where('stutus', 0)->where('user_id', $id)->value('color_name');

        //return $Produact;

        return response()->json([
            "status" => true,
            "data" => $Produact,
            "color" => $color,
        ]);

    }

    //show all Prduact For Clint ====
    public function index()
    {

        return response()->json([
            "status" => true,
            "data" => Produact::where('stutus', 1)->where('stutus_admin', 1)->orderBy('id', 'desc')->get(), //paginate(15)
        ]);
    }

    /**
     * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
     * Store a newly created resource in storage. Api
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store(ProduactRequestApi $req)
    {

        //'color_name' => 'string|nullable|sometimes',
        // $rules = [
        //     'cate_name' => 'required|string',
        //     'price' => 'numeric|nullable|sometimes',
        //     'size_id' => 'numeric|nullable|sometimes',
        //     'cate_image' => 'nullable',
        //     'cate_disc' => 'nullable|sometimes|string',
        //     'cate_id' => '',
        // ];
        // //  'color_name' => trans('admin.color_id'),

        // $data = Validator::make(request()->all(), $rules, [], [
        //     'cate_name' => trans('admin.cate_name'),
        //     'price' => trans('admin.price'),
        //     'size_id' => trans('admin.size_id'),
        //     'cate_image' => trans('admin.cate_image'),
        //     'cate_disc' => trans('admin.cate_disc'),
        //     'cate_id' => trans('admin.cate_id'),
        // ]);

        //Color(0xFFFFFDE7)
        // $data = $req->except("color_name");
        // if ($data->fails()) {
        //     return response()->json([
        //         "status" => false,
        //         "messages" => $data->messages(),
        //     ]);
        // }
        // $color = Str::between($req->color_name, '(', ')');
        // //  $data['color_name'] = $color;
        // $data = $req->except(["_token"]);
        // $data['user_id'] = auth()->user()->id;

        // if (request()->hasFile('cate_image')) {
        //     $data['cate_image'] = it()->upload('cate_image', 'produactcoontroller');
        // }
        $pro = new Produact;
        $pro->cate_name = $req->cate_name;
        $pro->color_name = Str::between($req->color_name, '(', ')');
        $pro->price = $req->price;
        $pro->size_id = $req->size_id;
        $pro->cate_disc = $req->cate_disc;
        $pro->cate_id = $req->cate_id;
        $pro->user_id = auth()->user()->id;

        $pro->save();

        // $iddd = auth()->user()->id;
        return response()->json([
            "status" => true,
            "message" => "Success Produact Add",
            // "data" => $pro,
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

        $p = Produact::where('id', $id)->value('request') + 1;
        Produact::where('id', $id)->update('request', $p);
        $show = Produact::find($id);
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
            'cate_name' => 'required|string',
            'color_id' => 'numeric|nullable|sometimes',
            'price' => 'numeric|nullable|sometimes',
            'size_id' => 'numeric|nullable|sometimes',
            'cate_image' => '' . it()->image() . '|nullable|sometimes',
            'cate_disc' => 'nullable|sometimes|string',
            'cate_id' => '',
        ];

        $data = Validator::make(request()->all(), $rules, [], [
            'cate_name' => trans('admin.cate_name'),
            'color_id' => trans('admin.color_id'),
            'price' => trans('admin.price'),
            'size_id' => trans('admin.size_id'),
            'cate_image' => trans('admin.cate_image'),
            'cate_disc' => trans('admin.cate_disc'),
            'cate_id' => trans('admin.cate_id'),
        ]);

        if ($data->fails()) {
            return response()->json([
                "status" => false, "
               messages" => $data->messages(),
            ]);
        }
        $data = request()->except(["_token"]);
        $data['user_id'] = auth()->user()->id;
        if (request()->hasFile('cate_image')) {
            it()->delete(Produact::find($id)->cate_image);
            $data['cate_image'] = it()->upload('cate_image', 'produactcoontroller');
        }
        Produact::where('id', $id)->update($data);

        $Produact = Produact::find($id);

        return response()->json([
            "status" => true,
            "message" => trans('admin.updated'), //,
            //// "data"=> $Produact
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
        $produactcoontroller = Produact::find($id);

        it()->delete($produactcoontroller->cate_image);
        it()->delete('produact', $id);

        @$produactcoontroller->delete();
        return response(["status" => true, "message" => trans('admin.deleted')]);
    }

    public function multi_delete(Request $r)
    {
        $data = $r->input('selected_data');
        if (is_array($data)) {
            foreach ($data as $id) {
                $produactcoontroller = Produact::find($id);

                it()->delete($produactcoontroller->cate_image);
                it()->delete('produact', $id);
                @$produactcoontroller->delete();
            }
            return response(["status" => true, "message" => trans('admin.deleted')]);
        } else {
            $produactcoontroller = Produact::find($data);

            it()->delete($produactcoontroller->cate_image);
            it()->delete('produact', $data);

            @$produactcoontroller->delete();
            return response(["status" => true, "message" => trans('admin.deleted')]);
        }
    }

}
