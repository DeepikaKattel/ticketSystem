<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Route;
use App\Model\VehicleType;
use App\Model\Trip;
use App\Model\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('bookTicket.index', compact('tickets'));
    }

    /**
     * Show the form for booking Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookTicket()
    {
        $route = Route::all();
        $vehicleType = VehicleType::all();
        return view('bookTicket.bookTicket', compact('route', 'vehicleType'));
    }

    /**
     * Checks for the trips.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkTicket(Request $request)
    {
        $booking = $request->input('bookingDate');
        $route = +$request->input('route');
        $vehicleType = +$request->input('vehicleType');
        $trips = Trip::where([
            ['departure_date', '=', $booking],
            ['route_id', '=', $route]
        ])->get();
        $listTickets = [];
        foreach ($trips as $trip) {
            if ($trip->vehicleType_id == $vehicleType && $trip->available_seats>0) {
                $trip['row'] = $trip->vehicleType->row;
                $trip['column'] = $trip->vehicleType->column;
                array_push($listTickets, $trip);
            }
        }
        $data = [
            'listTickets' => $listTickets
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trip = Trip::find($request->input('trip'));
        $new_allocated_seat = array_sum($request->input('new_allocated_seats'));
        $this->validate($request, [
            'trip' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->trip_id = $request->input('trip');
        $ticket->user_id = auth()->user()->id;
        $ticket->no_of_passenger = $new_allocated_seat;
        $ticket->amount = $trip->price * $new_allocated_seat;
        $ticket->allocated_seats = $request->input('new_allocated_seats');

        $trip->allocated_seats = $request->input('all_allocated_seats');
        $trip->available_seats = $trip->available_seats - $new_allocated_seat;
        $ticket->save();
        $trip->save();
        return redirect('/tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function status($id){
        $data=Ticket::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->id.' '.'has been changed successfully');

    }
}
