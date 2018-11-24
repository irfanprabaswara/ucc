<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AggrementController extends Controller
{
    //create session aggrement
    public function index(){
        session(['aggrement'=>'1']);
        return response('ok');
     }
}
