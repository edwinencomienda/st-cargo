<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Employeeprofile;
use DB;
use Auth;


class EmployeeprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        $data['fname'] = $request->fname;
        $data['mname'] = $request->mname;
        $data['lname'] = $request->lname;
        $data['birth_date'] = $request->birth_date;
        $data['undergrad'] = $request->undergrad;
        $data['graduate'] = $request->graduate;
        $data['postgrad'] = $request->postgrad;
        DB::table('employeeprofile')->insert($data);
        return back();
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
        $data['uuid'] = $request->uuid;
        $data['fname'] = $request->fname;
        $data['mname'] = $request->mname;
        $data['lname'] = $request->lname;
        $data['birth_date'] = $request->birth_date;
        $data['undergrad'] = $request->undergrad;
        $data['graduate'] = $request->graduate;
        $data['postgrad'] = $request->postgrad;
        DB::table('employeeprofile')->where('id',$id)->update($data);
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
        //
        DB::table('employeeprofile')->where('id', $id)->first();
        DB::table('employeeprofile')->where('id', $id)->delete();
       return back();
    }
}
