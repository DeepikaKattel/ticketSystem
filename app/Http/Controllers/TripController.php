<?php

namespace App\Http\Controllers;

use App\Model\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trip = Trip::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $trip = $trip->Paginate($trip->count());
        }
        else{
            $trip = $trip->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('trip.index', compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = DB::table('vehicles')->get();
        $route = DB::table('routes')->get();
        $dateToday = Carbon::today()->toDateString();
        return view('trip.create', compact('vehicle','route','dateToday'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trip = new Trip();
        $trip->title = request('title');
        $trip->departure_date = request('date');
        $trip->time = request('time');
        $trip->arrival_time = request('arrival_time');
        $trip->pickUp = request('pickUp');
        $trip->dropUp = request('dropUp');
        $trip->vehicle_id = request('vehicle');
        $trip->route_id = request('route');
        $trip->price = request('price');
        $time1 = strtotime($trip->arrival_time);
        $time2 = strtotime($trip->time);
        $difference = round(abs($time2 - $time1) / 3600,2);
        $trip->duration = $difference . 'h';
        $no_of_seats = $trip->vehicle->vehicleType->row * $trip->vehicle->vehicleType->column;
        $trip->available_seats = $no_of_seats;
        $trip->allocated_seats = array_fill(0, $no_of_seats, 0);


        $trip->save();
        $tripsave = $trip->save();
        if ($tripsave) {
            return redirect('/trip')->with("status", "The record has been stored");
        } else {
            return redirect('/trip')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::find($id);
        $vehicle = DB::table('vehicles')->get();
        $route = DB::table('routes')->get();
        $dateToday = Carbon::today()->toDateString();
        return view('trip.edit', compact('trip','vehicle','route','dateToday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        $trip = Trip::find($id);
        $trip->title = request('title');
        $trip->departure_date = request('date');
        $trip->time = request('time');
        $trip->arrival_time = request('arrival_time');
        $trip->pickUp = request('pickUp');
        $trip->dropUp = request('dropUp');
        $trip->vehicle_id = request('vehicle');
        $trip->route_id = request('route');
        $trip->save();
        $tripsave = $trip->save();
        if ($tripsave) {
            return redirect('/trip')->with("status", "The record has been updated");
        } else {
            return redirect('/trip')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::find($id)->delete();
        return redirect('/trip')->with('status','Deleted Successfully');
    }

    public function status($id){
        $data=Trip::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->title.' '.'has been changed successfully');

    }
}
