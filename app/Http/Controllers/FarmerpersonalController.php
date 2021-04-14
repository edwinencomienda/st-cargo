<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Farmerpersonal;
use Auth;
use DB;

class FarmerpersonalController extends Controller
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
             $data['education'] = $request->education;
             $data['pwd'] = $request->pwd;
             $data['porpis'] = $request->porpis;
             $data['aypis'] = $request->aypis;
             $data['ayp_detail'] = $request->ayp_detail;
             $data['religion'] = $request->religion;

             $data['status'] = $request->status;
             $data['spouse'] = $request->spouse;
             $data['mother'] = $request->mother;
             $data['gov_id'] = $request->gov_id;
             $data['gov_detail'] = $request->gov_detail;
             $data['househead'] = $request->househead;
             $data['nohousehead'] = $request->nohousehead;
             $data['householdrel'] = $request->householdrel;
             $data['noofmen'] = $request->noofmen;
             $data['maleno'] = $request->maleno;
             $data['femaleno'] = $request->femaleno;
             $data['coop'] = $request->coop;
             $data['coopdetail'] = $request->coopdetail;
             $data['emergency'] = $request->emergency;
             $data['contactno'] = $request->contactno;

             DB::table('farmerpersonal')->insert($data);
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

        $data = array();

        $data['uuid'] = $request->uuid;
            $data['education'] = $request->education;
            $data['pwd'] = $request->pwd;
            $data['porpis'] = $request->porpis;
            $data['aypis'] = $request->aypis;
            $data['ayp_detail'] = $request->ayp_detail;
            $data['religion'] = $request->religion;

            $data['status'] = $request->status;
            $data['spouse'] = $request->spouse;
            $data['mother'] = $request->mother;
            $data['gov_id'] = $request->gov_id;
            $data['gov_detail'] = $request->gov_detail;
            $data['househead'] = $request->househead;
            $data['nohousehead'] = $request->nohousehead;
            $data['householdrel'] = $request->householdrel;
            $data['noofmen'] = $request->noofmen;
            $data['maleno'] = $request->maleno;
            $data['femaleno'] = $request->femaleno;
            $data['coop'] = $request->coop;
            $data['coopdetail'] = $request->coopdetail;
            $data['emergency'] = $request->emergency;
            $data['contactno'] = $request->contactno;

            DB::table('farmerpersonal')->where('id',$id)->update($data);
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
        DB::table('farmerpersonal')->where('id', $id)->first();
        DB::table('farmerpersonal')->where('id', $id)->delete();
       //return redirect()->route('rsbsa');
       return back();
    }
}
