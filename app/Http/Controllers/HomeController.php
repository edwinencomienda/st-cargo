<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('welcome');
    }

    public function redirectone()
    {
        return view('layouts.profpic');
    }

    public function takeedit($id)
    {
        //edit diria
        $product = DB::table('users')->where('id', $id)->first();
        return view('rsbsa', compact('product'));


    }



}
