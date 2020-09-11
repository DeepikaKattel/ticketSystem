<?php

namespace App\Http\Controllers;

use App\Model\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $destination = Destination::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $destination = $destination->Paginate($destination->count());
        }
        else{
            $destination = $destination->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('destination.index', compact('destination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destination = new Destination();
        $destination->name = request('name');
        $destination->description = request('description');
        if ($request->hasFile('image')) {
            $image = $request->image;
            $fileName = rand() . "." . $image->getClientOriginalExtension();
            $destination_path = public_path("destinationImage/");
            $image->move($destination_path, $fileName);
            $destination->image = 'destinationImage/' . $fileName;
        }
        $destination->save();
        $destinationsave = $destination->save();
        if ($destinationsave) {
            return redirect('/destination')->with("status", "The record has been stored");
        } else {
            return redirect('/destination')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        $destination->name = request('name');
        $destination->description = request('description');
        if ($request->hasFile("image")) {
            if ($destination->image) {
                File::delete(public_path($destination->image));
            }
            $image = $request->image;
            $fileName = time() . "." . $image->getClientOriginalExtension();
            $destination_path = public_path("destinationImage/");
            $image->move($destination_path, $fileName);

            $destination->image = 'destinationImage/' . $fileName;
        }
        $destination->save();
        $destinationsave = $destination->save();
        if ($destinationsave) {
            return redirect('/destination')->with("status", "The record has been updated");
        } else {
            return redirect('/destination')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::find($id)->delete();
        return redirect('/destination')->with('status','Deleted Successfully');
    }

    public function status(Request $request, $id){
        $data=Destination::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->reg_number.' '.'has been changed successfully');

    }
}
