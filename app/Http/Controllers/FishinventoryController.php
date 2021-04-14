<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Reply;
use Auth;
use DB;
use Carbon\Carbon;

class FishinventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reply = DB::table('fishinventory')->get();
        return view('fishery.fishinvent', compact('reply'));
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
        $data['program'] = $request->crop_program;
        $data['product'] = $request->products;
        $data['qty'] = $request->quantity;
        $data['admin'] = $request->admin;

        $data['created_at'] = Carbon::now();
        DB::table('fishinventory')->insert($data);
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
        $data['program'] = $request->crop_program;
        $data['product'] = $request->products;
        $data['qty'] = $request->quantity;
        // $data['admin'] = $request->admin;

        // $data['created_at'] = Carbon::now();
        DB::table('fishinventory')->where('id', $id)->update($data);
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
        DB::table('fishinventory')->where('id', $id)->first();
        DB::table('fishinventory')->where('id', $id)->delete();
       return back()->with('danger','Successfully deleted!');
    }
}
