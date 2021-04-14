<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmerparttwoprofile;
use DB;
use Auth;

class FarmerparttwoController extends Controller
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

        $data['uuid'] = $request->uuid;
             $data['livelihood'] = $request->livelihood;
             $data['farmactivity'] = $request->farmactivity;
             $data['othercrop'] = $request->othercrop;
             $data['livestock'] = $request->livestock;
             $data['poultry'] = $request->poultry;
             $data['kindwork'] = $request->kindwork;

             $data['otherwork'] = $request->otherwork;
             $data['fishwork'] = $request->fishwork;
             $data['otherfish'] = $request->otherfish;
             $data['farmgross'] = $request->farmgross;
             $data['nonfarmgrass'] = $request->nonfarmgross;


             DB::table('farmerparttwo')->insert($data);
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
         $data['uuid'] = $request->uuid;
             $data['livelihood'] = $request->livelihood;
             $data['farmactivity'] = $request->farmactivity;
             $data['othercrop'] = $request->othercrop;
             $data['livestock'] = $request->livestock;
             $data['poultry'] = $request->poultry;
             $data['kindwork'] = $request->kindwork;

             $data['otherwork'] = $request->otherwork;
             $data['fishwork'] = $request->fishwork;
             $data['otherfish'] = $request->otherfish;
             $data['farmgross'] = $request->farmgross;
             $data['nonfarmgrass'] = $request->nonfarmgross;
             DB::table('farmerparttwo')->where('id',$id)->update($data);
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
        DB::table('farmerparttwo')->where('id', $id)->first();
        DB::table('farmerparttwo')->where('id', $id)->delete();
        return back();
    }
}
