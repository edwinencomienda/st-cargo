<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Tutorials;
use Auth;
use DB;
use Carbon\Carbon;

class DisposaltractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dispose = DB::table('disposaltractor')->get();
        return view('applied.disposal',compact('dispose'));
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
        //
        $a = $request->quantity;

        if ($request->name == 1) {

$users = DB::table('trinventory')->where('service_type',1)->sum('qty')
-DB::table('disposaltractor')->where('service_type',1)->where('tractor_status','Return')->sum('quantity')
-DB::table('disposaltractor')->where('service_type',1)->where('tractor_status','Unreturn')->sum('quantity');


        if ($users <= $a) {
            return redirect()->route('dispose')->with('error', 'Sorry, No Machine Left!');

        }
        else{
            $data = array();
            $data['tractor'] = $request->tractor_name;
            $data['quantity'] = $request->quantity;
            $data['admin'] = $request->admin;
            $data['tractor_status'] = $request->unreturn;


            DB::table('disposaltractor')->where('id',$id)->update($data);
            return redirect()->route('dispose')->with('success', 'Successfully disposed!');

        }
        }

        else {
            $a = $request->quantity;

$users = DB::table('trinventory')->where('service_type',2)->sum('qty')
-DB::table('disposaltractor')->where('service_type',2)->where('tractor_status','Return')->sum('quantity')
-DB::table('disposaltractor')->where('service_type',2)->where('tractor_status','Unreturn')->sum('quantity');
if ($users <= $a) {
    return redirect()->route('dispose')->with('error', 'Sorry, No Machine Left!');

}
else{
    $data = array();
    $data['tractor'] = $request->tractor_name;
    $data['quantity'] = $request->quantity;
    $data['admin'] = $request->admin;
    $data['tractor_status'] = $request->unreturn;


    DB::table('disposaltractor')->where('id',$id)->update($data);
    return redirect()->route('dispose')->with('success', 'Successfully disposed!');

}

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
        //
        DB::table('disposaltractor')->where('id', $id)->first();
        DB::table('disposaltractor')->where('id', $id)->delete();
       return redirect()->route('dispose');
    }

    public function mapsurvey()
    {
        //

       return view('applied.surveymap');
    }

    public function resched(Request $request, $id)
    {
        $data = array();
        $data['delivery_date'] = $request->delivery_date;

        DB::table('disposaltractor')->where('id',$id)->update($data);
        return back()->with('success', 'Successfully Updated!');
    }

    public function returnnow(Request $request, $id)
    {
        $data = array();
        $data['tractor_status']= $request->status;
        $data['date_ret'] = Carbon::now();
        $data['admin_ret']= $request->admin;


        DB::table('disposaltractor')->where('id',$id)->update($data);
        return back()->with('success', 'Successfully Updated!');
    }
}
