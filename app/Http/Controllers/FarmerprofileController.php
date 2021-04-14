<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Farmerprofile;
use Auth;
use DB;



class FarmerprofileController extends Controller
{
    //Farm  SAve
    public function store(Request $request)
    {

        //Hash::make($request->password)
        $data = array();

        $data['uuid'] = $request->uuid;
        $data['farm_exi'] = $request->farm_exi;
        $data['ref_no'] = $request->ref_no;
        $image = $request->file('idpicture');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['idpicture'] = $image_url;

            $data['lname'] = $request->lname;
            $data['fname'] = $request->fname;
            $data['mname'] = $request->mname;
            $data['exname'] = $request->exname;
            $data['gender'] = $request->gender;
            $data['houseno'] = $request->houseno;

            $data['street'] = $request->street;
            $data['brgy'] = $request->brgy;
            $data['city'] = $request->city;
            $data['province'] = $request->province;
            $data['contact'] = $request->contact;
            $data['birthdate'] = $request->birthdate;
            $data['birthplace'] = $request->birthplace;

            DB::table('farmerprofile')->insert($data);
            return back();

        }

    }

//second update
public function updatingone(Request $request)
{
    $data = array();

    $id = $request->uuid;

    $image = $request->file('idpicture');
    if ($image) {
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/media/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);

        $data['idpicture'] = $image_url;



        DB::table('farmerprofile')->where('uuid', $id)->update($data);


    }
    return $request;
}


    //update
    public function update(Request $request, $id)
    {

if ($request->retain == "retain") {
    $data = array();

    $data['uuid'] = $request->uuid;
    $data['farm_exi'] = $request->farm_exi;
    $data['ref_no'] = $request->ref_no;

    $data['lname'] = $request->lname;
    $data['fname'] = $request->fname;
    $data['mname'] = $request->mname;
    $data['exname'] = $request->exname;
    $data['gender'] = $request->gender;
    $data['houseno'] = $request->houseno;

    $data['street'] = $request->street;
    $data['brgy'] = $request->brgy;
    $data['city'] = $request->city;
    $data['province'] = $request->province;
    $data['contact'] = $request->contact;
    $data['birthdate'] = $request->birthdate;
    $data['birthplace'] = $request->birthplace;

    DB::table('farmerprofile')->where('id',$id)->update($data);
    return back();



} else {
    $oldlogo = $request->oldlogo;
    $data = array();

    $data['uuid'] = $request->uuid;
    $data['farm_exi'] = $request->farm_exi;
    $data['ref_no'] = $request->ref_no;
    $image = $request->file('idpicture');
    if ($image) {
       unlink($oldlogo);
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/media/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);

        $data['idpicture'] = $image_url;

        $data['lname'] = $request->lname;
        $data['fname'] = $request->fname;
        $data['mname'] = $request->mname;
        $data['exname'] = $request->exname;
        $data['gender'] = $request->gender;
        $data['houseno'] = $request->houseno;

        $data['street'] = $request->street;
        $data['brgy'] = $request->brgy;
        $data['city'] = $request->city;
        $data['province'] = $request->province;
        $data['contact'] = $request->contact;
        $data['birthdate'] = $request->birthdate;
        $data['birthplace'] = $request->birthplace;

        DB::table('farmerprofile')->where('id',$id)->update($data);
        return back();

    }
}
}


    //delete

    public function destroy($id)
    {
        //
         DB::table('farmerprofile')->where('id', $id)->first();
         DB::table('farmerprofile')->where('id', $id)->delete();
        //return redirect()->route('rsbsa');
        return back();
    }


    public function registtwo(Request $request)
    {

        //Hash::make($request->password)
        $data = array();

        $data['uuid'] = $request->uuid;
        $data['farm_exi'] = $request->farm_exi;
        $data['ref_no'] = $request->ref_no;
        $image = $request->file('idpicture');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['idpicture'] = $image_url;

            $data['lname'] = $request->lname;
            $data['fname'] = $request->fname;
            $data['mname'] = $request->mname;
            $data['exname'] = $request->exname;
            $data['gender'] = $request->gender;
            $data['houseno'] = $request->houseno;

            $data['street'] = $request->street;
            $data['brgy'] = $request->brgy;
            $data['city'] = $request->city;
            $data['province'] = $request->province;
            $data['contact'] = $request->contact;
            $data['birthdate'] = $request->birthdate;
            $data['birthplace'] = $request->birthplace;

            DB::table('farmerprofile')->insert($data);
            return redirect()->route('farmers');

        }

    }


}
