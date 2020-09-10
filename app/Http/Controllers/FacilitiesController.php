<?php

namespace App\Http\Controllers;

use App\Model\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $facility = Facilities::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $facility = $facility->Paginate($facility->count());
        }
        else{
            $facility = $facility->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('facility.index', compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = new Facilities();
        $facility->name = request('name');
        $facility->services = request('services');
        $facility->save();
        $facilitysave = $facility->save();
        if ($facilitysave) {
            return redirect('/facility')->with("status", "The record has been stored");
        } else {
            return redirect('/facility')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facilities::find($id);
        return view('facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facility = Facilities::find($id);
        $facility->name = request('name');
        $facility->services = request('services');
        $facility->save();
        $facilityave = $facility->save();
        if ($facilityave) {
            return redirect('/facility')->with("status", "The record has been updated");
        } else {
            return redirect('/facility')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facilities::find($id)->delete();
        return redirect('/facility')->with('status','Deleted Successfully');
    }
}
