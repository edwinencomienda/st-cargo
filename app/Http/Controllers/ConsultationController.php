<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Consultation;
use Auth;
use DB;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cons = DB::table('consultation')->where('role', Auth::user()->role)->latest()->get();
        return view('consult.consult',compact('cons'));
    }

    public function second()
    {
        //
        $cons = DB::table('consultation')->where('farmer', Auth::user()->uuid)->latest()->get();
        return view('farmers.replying',compact('cons'));
    }



    public function deteletdetails()
    {
        //
        $deleted = DB::table('trashdetails')->latest()->get();
        return view('consult.deletedetails',compact('deleted'));
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
        $data['farmer'] = $request->farmer;
        $data['role'] = $request->role;
        $data['title'] = $request->title;
        // $data['role'] = $request->role;
        $data['problem'] = $request->summary;


        $image = $request->file('visual');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['visual'] = $image_url;
            $data['reading']  = $request->reading;

            $data['created_at'] = Carbon::now();

            $product = DB::table('consultation')->insert($data);

            return back();
    }
    else{
        // $data['visual'] = $image_url;
        $data['reading']  = $request->reading;
        $data['created_at'] = Carbon::now();
        $product = DB::table('consultation')->insert($data);
        return back();
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $convo = DB::table('consultation')->where('id', $id)->first();
        return view('consult.consultopen', compact('convo'));

    }



    public function dates($id)

    {
        $convo = DB::table('consultation')->where('farmer', Auth::user()->uuid)->first();
        return view('farmers.include.open', compact('convo'));

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
        $data['reading'] = $request->read;
        DB::table('consultation')->where('id', $id)->update($data);
        return redirect()->route('consult');
    }


    public function update2(Request $request, $id)
    {
        //
        $data = array();
        $data['reading'] = $request->read;
        DB::table('reply')->where('id', $id)->update($data);
        return redirect()->route('farm.support');
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

        DB::table('consultation')->where('id', $id)->first();
        DB::table('consultation')->where('id', $id)->delete();


            return redirect()->route('consult');


    }

    public function destroying($id)
    {
        //

        DB::table('consultation')->where('id', $id)->first();
        DB::table('consultation')->where('id', $id)->delete();


            return redirect()->url('/nextconsultsent');


    }



    // public function destroytrash($id)
    // {
    //     //

    //     DB::table('trashdetails')->where('id', $id)->first();
    //     DB::table('trashdetails')->where('id', $id)->delete();
    //     return back();
    // }

}
