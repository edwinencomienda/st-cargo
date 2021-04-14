<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Loanrequest;
use Auth;
use DB;
use Carbon\Carbon;

class LoanrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = DB::table('loanrequest')->where('status', 'Uncheck')->latest()->get();
        return view('loans.loans',compact('loan'));
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
        $data['farmer'] = $request->farmer;
        $data['amount'] = $request->amount;
        $data['status'] = $request->status;

        $data['created_at'] = Carbon::now();
        DB::table('loanrequest')->insert($data);
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
        $data = array();
        $data['approved'] = $request->approved;
        $data['status'] = $request->status;
        $data['admin'] = $request->admin;

        $data['approved_on'] = $request->approved_on;

        // $data['created_at'] = Carbon::now();
        DB::table('loanrequest')->where('id', $id)->update($data);
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
        DB::table('loanrequest')->where('id', $id)->first();
        DB::table('loanrequest')->where('id', $id)->delete();
       //return redirect()->route('rsbsa');
       return back();
    }
}
