<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProblemAndIuss;
use Illuminate\Support\Facades\Auth;

class ProblemAndIussController extends Controller
{


    public function store(Request $request)
    {

        $p = new ProblemAndIuss;
        $p->message = $request->message;
        $p->user_id =Auth::user()->id;
     
;
        $p->save();

        return response(['stuts' => 'successfully Add Message']);
    }
}
