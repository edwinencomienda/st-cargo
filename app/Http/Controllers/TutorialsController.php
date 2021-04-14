<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Tutorials;
use Auth;
use DB;
use Carbon\Carbon;

class TutorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tutorial = DB::table('tutorials')->where('role', Auth::user()->role)->latest()->paginate(5);
        return view('tutorials.tutorial',compact('tutorial'));
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

        $data['role'] = $request->role;
        $data['title'] = $request->title;
        $data['caption'] = $request->caption;
        $image = $request->file('visual');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['visual'] = $image_url;

            $data['content'] = $request->summary;
            $data['uuid'] = $request->uuid;
            $data['created_at'] = Carbon::now();
             DB::table('tutorials')->insert($data);
            return redirect()->route('tutor');

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
            $data['title'] = $request->title;
            $data['caption'] = $request->caption;
            $data['content'] = $request->editor1;
            $data['uuid'] = $request->uuid;
            $data['created_at'] = Carbon::now();
             DB::table('tutorials')->where('id',$id)->update($data);
            return redirect()->route('tutor');
        } else {
            $oldlogo = $request->oldlogo;
            $data = array();

            $data['role'] = $request->role;
            $data['title'] = $request->title;
            $data['caption'] = $request->caption;
            $image = $request->file('visual');
            if ($image) {
                $image_name = date('dmy_H_s_i');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/media/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path,$image_full_name);
                $data['visual'] = $image_url;

                $data['content'] = $request->editor1;
                $data['uuid'] = $request->uuid;
                $data['created_at'] = Carbon::now();
                 DB::table('tutorials')->where('id',$id)->update($data);
                return redirect()->route('tutor');

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
        DB::table('tutorials')->where('id', $id)->first();
        DB::table('tutorials')->where('id', $id)->delete();
       return back();
    }



    public  function find(Request $request){

        if( isset($_GET['query']) && strlen($_GET['query']) > 1){

           $search_text = $_GET['query'];
           $countries = DB::table('tutorials')->where('title','LIKE','%'.$search_text.'%')->orWhere('content','like','%'.$search_text.'%')->paginate(5);
           $countries->appends($request->all());
           return view('tutorials.tutorial',['countries'=>$countries]);

       }else{
            return view('tutorials.tutorial');
       }

   }
   public  function search(){


       return view('tutorials.tutorial');

   }

}
