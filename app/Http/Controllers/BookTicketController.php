<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Model\BookTicket;
use App\Model\Ticket;
use App\Model\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class BookTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function welcome(Request $request)
    {
        $vehicleType = DB::table('vehicle_type')->get();
        $route = DB::table('routes')->get();
        $ticket = DB::table('tickets')->get();
        $seat = DB::table('book_tickets')
            ->pluck('seat');

        return view('welcome', compact('vehicleType', 'route', 'ticket','seat'));
    }


    public function index(Request $request)
    {
        $bookTicket = BookTicket::orderBy('id');
        $ticket = Ticket::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $bookTicket = $bookTicket->Paginate($bookTicket->count());
        }
        else{
            $bookTicket = $bookTicket->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('bookTicket.index', compact('bookTicket','ticket'));
    }



    public function checkTicket(Request $request)
    {
        $booking = $request->input('date');
        $route = +$request->input('route');
        $vehicleType = +$request->input('vehicleType');
        $trips = Trip::where([
            ['departure_date', '=', $booking],
            ['route_id', '=', $route]
        ])->get();
        $listTickets = [];
        foreach ($trips as $trip) {
            if ($trip->vehicle->vehicleType_id == $vehicleType && $trip->available_seats>0) {
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleType = DB::table('vehicle_type')->get();
        $route = DB::table('routes')->get();
        return view('bookTicket.create', compact('vehicleType','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pickup'=>'required',
            'drop'=>'required',
            'vehicleType'=>'required',
            'date' => 'required|date|after:yesterday',
            'seat' => 'required',

        ]);
        $bookTicket = new BookTicket();
        $bookTicket->date = request('date');
        $bookTicket->vehicleType = request('vehicleType');
        $bookTicket->route = request('route');
        $bookTicket->passengers = request('passengers');
        $bookTicket->children = request('children');
        $bookTicket->special = request('special');

        $price = DB::table('prices')
            ->where('vehicleType', '=', $bookTicket->vehicleType)
            ->first();
        $a = ($price->price * $bookTicket->passengers) +
            ($price->children_price * $bookTicket->children) +
            ($price->special_price * $bookTicket->special);
        $bookTicket->price = $a;
        $bookTicket->email = request('email');
        $bookTicket->pickup = request('pickup');
        $bookTicket->drop = request('drop');
        $request->merge([
            'seat' => implode(',', (array)$request->get('seat')),
        ]);

        $seat = DB::table('book_tickets')
                ->where('date', '=', $request->date)
                ->where(function($query) use ($request) {
                    $query->where('seat',$request->seat)
                            ->where('vehicleType', '=', $request->vehicleType);
                })
                ->count() < 1;

        if ($seat) {
            $bookTicket = BookTicket::create($request->all());
            $bookTicket->email = request('email');
            $price = DB::table('prices')
                ->where('vehicleType', '=', $bookTicket->vehicleType)
                ->first();
            $a = ($price->price * $bookTicket->passengers) +
                ($price->children_price * $bookTicket->children) +
                ($price->special_price * $bookTicket->special);
            $bookTicket->price = $a;
            $bookMessage = [
                'title' => 'Booking Confirmation',
                'body' => 'Your appointment has been booked. Your total ticket price is'. + $bookTicket->price

            ];
            Mail::to($bookTicket->email)->send(new SendMail($bookMessage));
            $bookTicket->save();
            return redirect()->back()->with("success","Your appointment has been booked.");
        }elseif(!$seat){
            return redirect()->back()->with("error", "The selected seats are not available");
        } else {
            return redirect()->back()->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookTicket  $bookTicket
     * @return \Illuminate\Http\Response
     */
    public function show(BookTicket $bookTicket)
    {

    }
    public function card()
    {
        return view('card');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookTicket  $bookTicket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookTicket = BookTicket::find($id);
        $vehicleType = DB::table('vehicle_type')->get();
        $route = DB::table('routes')->get();
        return view('bookTicket.edit', compact('bookTicket','vehicleType','route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookTicket  $bookTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookTicket = BookTicket::find($id);
        $bookTicket->date = request('date');
        $bookTicket->vehicleType = request('vehicleType');
        $bookTicket->route = request('route');
        $bookTicket->seat = request('seat');
        $bookTicket->passengers = request('passengers');
        $bookTicket->children = request('children');
        $bookTicket->special = request('special');
        $bookTicket->price = request('price');
        $bookTicket->email = request('email');
        $bookTicket->pickup = request('pickup');
        $bookTicket->drop = request('drop');
        $bookTicket->save();
        $bookTicketsave = $bookTicket->save();
        if ($bookTicketsave) {
            return redirect('/bookTicket')->with("status", "The record has been updated");
        } else {
            return redirect('/bookTicket')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookTicket  $bookTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookTicket = BookTicket::find($id)->delete();
        return redirect('/bookTicket')->with('status','Deleted Successfully');
    }

    public function status($id){
        $data=BookTicket::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->id.' '.'has been changed successfully');

    }
}
