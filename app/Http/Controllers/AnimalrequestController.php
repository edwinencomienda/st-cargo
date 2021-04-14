<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Tutorials;
use Auth;
use DB;
use Carbon\Carbon;

class AnimalrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lives = DB::table('animalrequest')->where('status', 'Uncheck')->latest()->get();
        return view('livestock.livestockrequest',compact('lives'));
    }


    public function status()
    {

        $cropreq = DB::table('animalrequest')->get();
        return view('livestock.livestatus',compact('cropreq'));
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
        $data['program'] = $request->program;
        $data['products'] = $request->products;
        $data['quantity'] = $request->quantity;
        $data['status'] = $request->status;

        $data['created_at'] = Carbon::now();
        DB::table('animalrequest')->insert($data);
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
        $data['date_delivery'] = $request->delivery_date;
        DB::table('animalrequest')->where('id', $id)->update($data);
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
        DB::table('animalrequest')->where('id', $id)->first();
        DB::table('animalrequest')->where('id', $id)->delete();
       return back()->with('danger','Successfully deleted!');
    }
}
