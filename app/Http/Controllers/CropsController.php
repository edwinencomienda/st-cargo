<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class CropsController extends Controller
{
    public  function index(){
        return view ('crops.dashboard');
     }

     public  function report(){
        return view ('crops.report');
     }
}
