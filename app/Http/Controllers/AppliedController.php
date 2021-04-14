<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AppliedController extends Controller
{
    //
    public function index(Request $request){
        return view('applied.dashboard');
     }

     public function pmanage(Request $request){
        return view('applied.pmanagement');
     }

     public function report(Request $request){
        return view('applied.report1');
     }

}
