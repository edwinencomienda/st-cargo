<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Activity;
use Auth;
use DB;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activity = DB::table('activity')->where('role', Auth::user()->role)->latest()->paginate(4);
        return view('activities.active',compact('activity'));
    }
   // }

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
        $data['role'] = $request->role;
        $data['content'] = $request->summary;

        $data['title'] = $request->title;
        $data['location'] = $request->location;
        $data['when'] = $request->when;

        // $data['role'] = $request->role;


        $image = $request->file('visual');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['visual'] = $image_url;
            $data['uuid'] = $request->uuid;

            $data['created_at'] = Carbon::now();

            $product = DB::table('activity')->insert($data);

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

    if ($request->retain == "retain") {
        $data = array();

        $data['role'] = $request->role;
        $data['content'] = $request->editor1;

        $data['title'] = $request->title;
        $data['location'] = $request->location;
        $data['when'] = $request->when;
        $data['uuid'] = $request->uuid;
        //    $data['created_at'] = Carbon::now();
             DB::table('activity')->where('id',$id)->update($data);
            return redirect()->route('active');

    } else {



        $oldlogo = $request->oldlogo;
        $data = array();

        $data['role'] = $request->role;
        $data['content'] = $request->editor1;

        $data['title'] = $request->title;
        $data['location'] = $request->location;
        $data['when'] = $request->when;

        $image = $request->file('visual');
        if ($image) {

            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['visual'] = $image_url;

            $data['uuid'] = $request->uuid;
        //    $data['created_at'] = Carbon::now();
             DB::table('activity')->where('id',$id)->update($data);
            return redirect()->route('active');
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
        DB::table('activity')->where('id', $id)->first();
        DB::table('activity')->where('id', $id)->delete();
       return back();
    }



    public  function find(Request $request){


         if( isset($_GET['query']) && strlen($_GET['query']) > 1){

            $search_text = $_GET['query'];
            $countries = DB::table('activity')->where('title','LIKE','%'.$search_text.'%')->orWhere('location','like','%'.$search_text.'%')->paginate(5);
            $countries->appends($request->all());
            return view('activities.active',['countries'=>$countries]);

        }else{
             return view('activities.active');
        }

    }
    public  function search(){


        return view('activities.active');

    }



}
