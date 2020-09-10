<?php

namespace App\Http\Controllers;

use App\Model\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicle = Vehicle::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $vehicle = $vehicle->Paginate($vehicle->count());
        }
        else{
            $vehicle = $vehicle->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('vehicle.index', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleType = DB::table('vehicle_type')->get();
        return view('vehicle.create', compact('vehicleType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->reg_number = request('reg_number');
        $vehicle->vehicleType = request('vehicleType');
        $vehicle->engine = request('engine');
        $vehicle->chassis = request('chassis');
        $vehicle->model = request('model');
        $vehicle->owner_name = request('owner_name');
        $vehicle->owner_number = request('owner_number');
        $vehicle->brand_name = request('brand_name');
        $vehicle->save();
        $vehiclesave = $vehicle->save();
        if ($vehiclesave) {
            return redirect('/vehicle')->with("status", "The record has been stored");
        } else {
            return redirect('/vehicle')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $vehicle = Vehicle::find($id);
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->reg_number = request('reg_number');
        $vehicle->vehicleType = request('vehicleType');
        $vehicle->engine = request('engine');
        $vehicle->chassis = request('chassis');
        $vehicle->model = request('model');
        $vehicle->owner_name = request('owner_name');
        $vehicle->owner_number = request('owner_number');
        $vehicle->brand_name = request('brand_name');
        $vehicle->save();
        $vehiclesave = $vehicle->save();
        if ($vehiclesave) {
            return redirect('/vehicle')->with("status", "The record has been updated");
        } else {
            return redirect('/vehicle')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle= Vehicle::find($id)->delete();
        return redirect('/vehicle')->with('status','Deleted Successfully');
    }

    public function status(Request $request, $id){
        $data=Vehicle::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->reg_number.' '.'has been changed successfully');
    }
}
