<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Loanrequest;
use Auth;
use DB;
use Carbon\Carbon;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enroll = DB::table('enrollment')->where('program', Auth::user()->role)->where('status', 'Uncheck')->latest()->get();
        return view('enrollment.enroll',compact('enroll'));
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
        $data = array();
        $data['farmer'] = $request->farmer;
        $data['parcel'] = $request->parcel;

        $data['program'] = $request->program;
        $data['sources'] = $request->sources;


        $data['status'] = $request->status;

        $data['created_at'] = Carbon::now();
        DB::table('enrollment')->insert($data);
        return back()->with('success', 'Successfully Requested!');
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
        $data = array();
        $data['approved'] = $request->approved;
        $data['status'] = $request->status;
        $data['admin'] = $request->admin;

        // $data['approved_on'] = $request->approved_on;

        // $data['created_at'] = Carbon::now();
        DB::table('enrollment')->where('id', $id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('enrollment')->where('id', $id)->first();
        DB::table('enrollment')->where('id', $id)->delete();
       //return redirect()->route('rsbsa');
       return back();
    }
}
