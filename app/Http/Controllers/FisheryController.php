<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FisheryController extends Controller
{
    public  function index(){
        return view ('fishery.dashboard');
     }

     public  function report(){
        return view ('fishery.report');
     }
}
