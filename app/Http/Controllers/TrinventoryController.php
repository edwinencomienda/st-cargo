<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Trinventory;
use Auth;
use DB;
use Carbon\Carbon;
class TrinventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $invent = DB::table('trinventory')->orderBy('id', 'desc')->paginate(5);

        $invent = DB::table('trinventory')->orderBy('id', 'desc')->get();
        return view('applied.inventory',compact('invent'));
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
        $data['service_type'] = $request->service_type;
        $data['tractor_name'] = $request->tractor_name;
        $data['tractor_model'] = $request->tractor_model;
        $data['qty'] = $request->qty;
        $data['admin'] = $request->uuid;

        $data['created_at'] = Carbon::now();



        DB::table('trinventory')->insert($data);
        return redirect()->route('trinventory');
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
        $data['service_type'] = $request->service_type;
        $data['tractor_name'] = $request->tractor_name;
        $data['tractor_model'] = $request->tractor_model;
        $data['qty'] = $request->qty;
        $data['admin'] = $request->uuid;

        DB::table('trinventory')->where('id',$id)->update($data);
        return redirect()->route('trinventory');
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
        DB::table('trinventory')->where('id', $id)->first();
        DB::table('trinventory')->where('id', $id)->delete();
        return redirect()->route('trinventory');
    }
}
