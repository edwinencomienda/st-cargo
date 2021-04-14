<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Tractorrequest;
use Auth;
use DB;
use Carbon\Carbon;

class TractorrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trservice = DB::table('tractorrequest')->where('status', 'Uncheck')->latest()->get();

        return view('applied.trrequest',compact('trservice'));
    }

    public function secondindex()
    {

        $str = DB::table('tractorrequest')->where('status', 'Checked')->latest()->get();
        return view('applied.trstatus',compact('str'));
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
        $data['uuid'] = $request->uuid;
        $data['tractor_service'] = $request->tractor_service;
        $data['brgylocation'] = $request->brgylocation;
        $data['payamount'] = $request->payamount;
        $data['hectare'] = $request->hectare;



        $data['created_at'] = Carbon::now();

        $data['approved'] = $request->approved;
        $data['status'] = $request->status;


        DB::table('tractorrequest')->insert($data);
       // return redirect()->route('trrequest');
       return back()->with('success', 'Successfully Requested, please wait for confirmation under your reviews.');

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
        $data['approvedby'] = $request->approvedby;
        $data['approved'] = $request->approved;
        $data['status'] = $request->status;

        DB::table('tractorrequest')->where('id',$id)->update($data);
        return redirect()->route('trrequest');
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

        DB::table('tractorrequest')->where('id', $id)->first();
        DB::table('tractorrequest')->where('id', $id)->delete();
       return back();
    }
}
