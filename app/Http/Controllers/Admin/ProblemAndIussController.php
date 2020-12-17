<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProblemAndIuss;


class ProblemAndIussController extends Controller
{
    public function index(){
        return ProblemAndIuss::get();
    }
}
