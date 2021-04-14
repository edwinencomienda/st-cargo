<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::all();
        return view('outlet.home', compact('outlets'));
    }

    public function store(Request $request){
        $outlets = new Outlet;

        $outlets->outlet_name = $request->outlet_name;
        $outlets->outlet_address = $request->outlet_address;
        $outlets->outlet_latitude = $request->outlet_latitude;
        $outlets->outlet_longitude = $request->outlet_longitude;
        $outlets->save();

        return redirect()->route('homemap');
    }

    public function show($id){
        $outlets = Outlet::findOrFail($id);

        return view('/show_outlet', compact('outlets'));
    }

    public function edit($id){
        $outlets = Outlet::findOrFail($id);

        return view('/edit_outlet', compact('outlets'));
    }

    public function update(Request $request, $id){
        Outlet::where('id', '=', $id)->update(array(
            'outlet_name' => $request->input('outlet_name'),
            'outlet_address' => $request->input('outlet_address'),
            'outlet_latitude' => $request->input('outlet_latitude'),
            'outlet_longitude' => $request->input('outlet_longitude')
            ));

        return redirect()->route('homemap');
    }

    public function destroy($id)
    {
        $outlets =Outlet::find($id);
        $outlets->delete();
        return  redirect()->route('homemap');

    }

}
