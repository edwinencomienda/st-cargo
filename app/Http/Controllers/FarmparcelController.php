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

class FarmparcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reply = DB::table('farmparcel')->get();
        return view('research.farmlist', compact('reply'));
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
             $data['agrarian'] = $request->agrarian;
             $data['location'] = $request->location;
             $data['hectare'] = $request->hectare;
             $data['ownership'] = $request->ownership;
             $data['owner'] = $request->owner;
             $data['otherown'] = $request->otherown;

             $data['tenant'] = $request->tenant;
             $data['lesse'] = $request->lesse;

             DB::table('farmparcel')->insert($data);
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
            $data['agrarian'] = $request->agrarian;
            $data['location'] = $request->location;
            $data['hectare'] = $request->hectare;
            $data['ownership'] = $request->ownership;
            $data['owner'] = $request->owner;
            $data['otherown'] = $request->otherown;

            $data['tenant'] = $request->tenant;
            $data['lesse'] = $request->lesse;

            DB::table('farmparcel')->where('id',$id)->update($data);
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
        DB::table('farmparcel')->where('id', $id)->first();
        DB::table('farmparcel')->where('id', $id)->delete();
       return back();
    }
}
