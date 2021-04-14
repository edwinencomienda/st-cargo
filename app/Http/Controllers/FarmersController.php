<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Reply;
use Auth;
use DB;
use Carbon\Carbon;

class FarmersController extends Controller
{
    public  function index(){
        return view('farmers.dashboard');
     }

     public  function act(){
        return view('farmers.active');
     }

     public function activity($id)
     {
        $reply = DB::table('activity')->where('id', $id)->first();
        return view('farmers.activity', compact('reply'));
     }

     public  function tutorial(){
        return view('farmers.tutorials');
     }

     public function tutorialview($id)
     {
        $reply = DB::table('tutorials')->where('id', $id)->first();
        return view('farmers.tutorialsview', compact('reply'));
     }

     public  function bills(){
        return view('farmers.billings');
     }

     public  function enrollment(){
        return view('farmers.enrollment');
     }


     public  function support(){
        return view('farmers.support');
     }


     public  function thread(){
        return view('farmers.thread');
     }


     public  function registon(){
        return view('farmers.registeron');
     }


     public  function croprequest(){
        return view('farmers.cropreq');
     }


     public  function livestockreq(){
        return view('farmers.livestock');
     }

     public  function fishreq(){
        return view('farmers.fish');
     }

     public  function loanrequest(){
        return view('farmers.loan');
     }

     public  function tractor(){
        return view('farmers.tractor');
     }

     public  function reviewing(){
        return view('farmers.review');
     }
}
