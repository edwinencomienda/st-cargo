<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Farmparcel;
use App\Models\Enrollment;
use Auth;
use DB;
use Carbon\Carbon;
use Loop;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parcel = DB::table('farmparcel')->where('markings', 'Good')->get();
        return view('research.parcelmap', compact('parcel'));
    }


    public function enrollment()
    {
        $reply = DB::table('enrollment')->where('approved', 'Approved')->get();
        return view('research.enrollment', compact('reply'));
    }


    public function allenroll()
    {
        $parcel = DB::table('enrollment')->where('markings', 'Good')->get();
        return view('research.allenrollment', compact('parcel'));
    }

    public function cropmap()
    {
        $parcel = DB::table('enrollment')->where('program', 2)->where('markings', 'Good')->get();
        return view('research.cropmap', compact('parcel'));
    }


    public function fishmap()
    {
        $parcel = DB::table('enrollment')->where('program', 3)->where('markings', 'Good')->get();
        return view('research.fishmap', compact('parcel'));
    }

    public function livemap()
    {
        $parcel = DB::table('enrollment')->where('program', 4)->where('markings', 'Good')->get();
        return view('research.livestockmap', compact('parcel'));
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
        $product = DB::table('farmparcel')->where('id', $id)->first();
        return view('research.seefarm', compact('product'));
    }

    public function senroll($id)
    {
        $product = DB::table('enrollment')->where('id', $id)->first();
        return view('research.seenroll', compact('product'));
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

    }

    public function updateparcel(Request $request, $id)
    {
        $data = array();
            $data['markings'] = $request->markings;
            $data['latt'] = $request->latt;
            $data['longi'] = $request->longi;
            DB::table('farmparcel')->where('id',$id)->update($data);
            return back();
    }


    public function updateenrol(Request $request, $id)
    {
        $data = array();

            $data['markings'] = $request->markings;
            $data['latt'] = $request->latt;
            $data['longi'] = $request->longi;
            DB::table('enrollment')->where('id',$id)->update($data);
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
    }
}
