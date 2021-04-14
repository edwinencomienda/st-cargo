<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Database\Connection;
use App\Profpic;
use DB;
use Auth;


class ProfpicController extends Controller
{

    public function select($query, $bindings = array())
{
    return $this->run($query, $bindings, function($me, $query, $bindings)
    {
        if ($me->pretending()) {return array();}

        // For select statements, we'll simply execute the query and return an array
        // of the database result set. Each element in the array will be a single
        // row from the database table, and will either be an array or objects.
        $statement = $me->getPdo()->prepare($query);

        $statement->execute($me->prepareBindings($bindings));

        return $statement->fetchAll($me->getFetchMode());
    });
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $profpic = DB::table('profpic')->get();
            return redirect()->route('profilemanage', compact('profpic'));
        }

        public function redigest()
        {
            $profpic = DB::table('profpicture')->where('uuid', '=', 'auth()->user()->uuid')
            ->orderBy('id','DESC')->take(1)->get();
             return view('layouts.newapp', compact('profpic'));
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
        $data['uuid'] = $request->uuid;
        $image = $request->file('files');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['profpic'] = $image_url;
            $product = DB::table('profpicture')->insert($data);

            return redirect()->route('profilemanage');

        }

    }

    public function store_another(Request $request)
    {
        //
        $data = array();
        $data['uuid'] = $request->uuid;
        $image = $request->file('files');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            // $upload_path = $image->store('public/images');
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['profpic'] = $image_url;
            $product = DB::table('profpicture')->insert($data);

        if (Auth::user()->role == 1) {
            return redirect()->route('applied');
        }
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
        $oldlogo = $request->oldlogo;
        $data = array();
        $data['uuid'] = $request->uuid;
        $image = $request->file('files');
        if ($image) {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['profpic'] = $image_url;
            $product = DB::table('profpicture')->where('id',$id)->update($data);

            return redirect()->route('profilemanage');

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
        DB::table('profpicture')->where('id', $id)->first();
        DB::table('profpicture')->where('id', $id)->delete();
        return redirect()->route('profilemanage');
    }



}
