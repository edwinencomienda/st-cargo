<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Cropproduct;
use Auth;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CropdisposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crp = DB::table('cropdispose')->latest()->get();
        return view('crops.cropdispose', compact('crp'));
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


        $users = DB::table('cropinventory')->where('crop_product', $request->products)->sum('qty')
        -DB::table('cropdispose')->where('products',$request->products)->where('rendered','Delivered')->sum('quantity');

        if ($users <= $request->quantity) {
            return back()->with('error', 'Sorry, Insufficient Products Left!');
        }
        else{
            $data = array();
            $data['quantity'] = $request->quantity;
            $data['rendered'] = $request->rendered;
            $data['admin'] = $request->admin;
            $data['created_at'] = Carbon::now();
            DB::table('cropdispose')->where('id', $id)->update($data);
            return back()->with('success', 'Successfully disposed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cropdispose')->where('id', $id)->first();
        DB::table('cropdispose')->where('id', $id)->delete();
       return back()->with('danger','Successfully deleted!');

    }
}
