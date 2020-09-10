<?php

namespace App\Http\Controllers;

use App\Model\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicleType = VehicleType::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $vehicleType = $vehicleType->Paginate($vehicleType->count());
        }
        else{
            $vehicleType = $vehicleType->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('vehicleType.index', compact('vehicleType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicleType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicleType = new VehicleType();
        $vehicleType->name = request('name');
        $vehicleType->layout = request('layout');
        $vehicleType->seat = request('seat');
        $vehicleType->facility_id = request('facility_id');
        $vehicleType->save();
        $vehicleTypesave = $vehicleType->save();
        if ($vehicleTypesave) {
            return redirect('/vehicleType')->with("status", "The record has been stored");
        } else {
            return redirect('/vehicleType')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicleType = VehicleType::find($id);
        return view('vehicleType.edit', compact('vehicleType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleType = VehicleType::find($id);
        $vehicleType->name = request('name');
        $vehicleType->layout = request('layout');
        $vehicleType->seat = request('seat');
        $vehicleType->facility_id = request('facility_id');
        $vehicleType->save();
        $vehicleTypeave = $vehicleType->save();
        if ($vehicleTypeave) {
            return redirect('/vehicleType')->with("status", "The record has been updated");
        } else {
            return redirect('/vehicleType')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleType = VehicleType::find($id)->delete();
        return redirect('/vehicleType')->with('status','Deleted Successfully');
    }
}
