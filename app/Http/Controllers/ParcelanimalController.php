<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Tutorials;
use Auth;
use DB;
use Carbon\Carbon;
use Loop;

class ParcelanimalController extends Controller
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
        $data = array();

        $data['uuid'] = $request->uuid;

            $data['parcel'] = $request->parcel;
            $data['animal'] = $request->animal;
            $data['size'] = $request->size;
            $data['heads'] = $request->heads;
            $data['farmtype'] = $request->farmtype;

            $data['organi'] = $request->organi;


            DB::table('parcelanimal')->insert($data);
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

            $data['parcel'] = $request->parcel;
            $data['animal'] = $request->animal;
            $data['size'] = $request->size;
            $data['heads'] = $request->heads;
            $data['farmtype'] = $request->farmtype;

            $data['organi'] = $request->organi;


            DB::table('parcelanimal')->where('id',$id)->update($data);
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
        DB::table('parcelanimal')->where('id', $id)->first();
        DB::table('parcelanimal')->where('id', $id)->delete();
       return back();
    }
}
