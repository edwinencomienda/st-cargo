<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Reply;
use Auth;
use DB;
use Carbon\Carbon;


class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reply = DB::table('reply')->where('role', Auth::user()->role)->get();
       return view('consult.replying', compact('reply'));
        //redirect()->route('consult', compact('reply'));

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
        $data['conid'] = $request->conid;
        $data['farmer'] = $request->farmer;
        $data['anstitle'] = $request->anstitle;
        // $data['role'] = $request->role;



        $image = $request->file('ansvisual');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['ansvisual'] = $image_url;
            $data['ansproblem'] = $request->ansproblem;
            $data['role'] = $request->role;
            $data['admin'] = $request->admin;
            $data['created_at'] = Carbon::now();
            DB::table('reply')->insert($data);
            return back();
    }
    else{
        $data['ansproblem'] = $request->ansproblem;
        $data['role'] = $request->role;
        $data['admin'] = $request->admin;
        $data['created_at'] = Carbon::now();
        DB::table('reply')->insert($data);
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
        //
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
        DB::table('reply')->where('id', $id)->first();
        DB::table('reply')->where('id', $id)->delete();
        return back();
    }



    public function infome(Request $request)
    {
        $data = array();
        $data['farmer'] = $request->farmer;
        $data['anstitle'] = $request->anstitle;
        $data['ansproblem'] = $request->ansproblem;
        $data['role'] = $request->role;
        $data['admin'] = $request->admin;
        $data['created_at'] = Carbon::now();
        DB::table('reply')->insert($data);
        return back();
    }
}
