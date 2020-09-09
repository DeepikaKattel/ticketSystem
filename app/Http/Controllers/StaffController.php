<?php

namespace App\Http\Controllers;


use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staff = Staff::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $staff = $staff->Paginate($staff->count());
        }
        else{
            $staff = $staff->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Staff $staff)
    {
        $staff = new Staff();
        $staff->name = request('name');
        $staff->position = request('position');
        $staff->phoneNumber = request('phoneNumber');
        $staff->address = request('address');
        $staff->save();
        $staffsave = $staff->save();
        if ($staffsave) {
            return redirect('/staff')->with("status", "The record has been stored");
        } else {
            return redirect('/staff')->with("error", "There is an error");
        }
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
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
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
        $staff = Staff::find($id);
        $staff->name = request('name');
        $staff->position = request('position');
        $staff->phoneNumber = request('phoneNumber');
        $staff->address = request('address');
        $staff->save();
        $staffave = $staff->save();
        if ($staffave) {
            return redirect('/staff')->with("status", "The record has been updated");
        } else {
            return redirect('/staff')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id)->delete();
        return redirect('/staff')->with('status','Deleted Successfully');
    }
}
