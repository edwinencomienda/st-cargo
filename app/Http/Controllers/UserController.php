<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use DB;



class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table('users')
        $users = DB::table('users')->where('role', Auth::user()->role)->get();
        return view('applied.pmanagement', compact('users'));
        // $users = DB::table('users')->where('role', 1)->paginate(5);
        // return view('applied.pmanagement', ['users' => $users]);
    }

    public function readindex()
    {
        //
        $farmer = DB::table('users')->where('role', 6)->get();
        return redirect()->route('profilemanage',compact('farmer'));
      }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
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

        try {
            $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        DB::table('users')->insert($data);
        return back()->with('success','Successfully created!');

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return back()->with('danger', 'Duplicate Entry');
            }
        }

        //Hash::make($request->password)

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
        $users = DB::table('users')->where('id', $id)->first();
        return view('layouts.include.adduser', compact('users'));

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
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);

        DB::table('users')->where('id',$id)->update($data);
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
         DB::table('users')->where('id', $id)->first();
         DB::table('users')->where('id', $id)->delete();
        return back()->with('danger','Successfully deleted!');
    }


    public function regcustom()
    {


        return view('registercustom');

    }

    public function rsbsa()
    {

        $product = DB::table('users')->where('id', $id)->first();
        return view('rsbsa',compact('product'));

    }

    public function lpo(){
        $ftps = DB::table('users')->where('role', 6)->paginate(5);
        return view('applied.flt',compact('ftps'));
    }

  public  function find(Request $request){


     if( isset($_GET['query']) && strlen($_GET['query']) > 1){

        $search_text = $_GET['query'];
        $countries = DB::table('users')->where('name','LIKE','%'.$search_text.'%')->orWhere('email','like','%'.$search_text.'%')->paginate(2);
        $countries->appends($request->all());
        return view('applied.include.sst',['countries'=>$countries]);

    }else{
         return view('applied.include.sst');
    }

}
public  function search(){

    return view('applied.include.sst');

}



 public function registration(Request $request)
    {


        try {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);
        DB::table('users')->insert($data);
        return redirect()->route('login')->with('success','Successfully created!');

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return back()->with('danger', 'Duplicate Entry');
            }
        }
    }

}
