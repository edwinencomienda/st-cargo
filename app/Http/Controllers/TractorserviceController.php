<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use DB;
use Carbon\Carbon;

class TractorserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trservice = DB::table('tractorservice')->get();
        return view('applied.service',compact('trservice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = array();
        $data['service'] = $request->service;
        $data['price'] = $request->price;
        $data['created_at'] = Carbon::now();
        DB::table('tractorservice')->insert($data);

       // DB::table('employeeprofile')->where('id',$id)->update($data);
        return redirect()->route('trservice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = array();
        $data['service'] = $request->service;
        $data['price'] = $request->price;
        $data['created_at'] = Carbon::now();
        DB::table('tractorservice')->where('id',$id)->update($data);
        return redirect()->route('trservice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('tractorservice')->where('id', $id)->first();
        DB::table('tractorservice')->where('id', $id)->delete();
        return redirect()->route('trservice');
    }
}
