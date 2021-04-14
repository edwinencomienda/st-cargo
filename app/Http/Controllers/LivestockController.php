<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public  function index(){
        return view ('livestock.dashboard');
     }

     public  function report(){
        return view ('livestock.report');
     }

}
