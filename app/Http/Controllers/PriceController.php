<?php

namespace App\Http\Controllers;

use App\Model\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $price = Price::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $price = $price->Paginate($price->count());
        }
        else{
            $price = $price->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('price.index', compact('price'));
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
        return view('price.create', compact('vehicleType','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new Price();
        $price->route = request('route');
        $price->vehicleType = request('vehicleType');
        $price->price = request('price');
        $price->children_price = request('children_price');
        $price->special_price = request('special_price');
        $price->save();
        $pricesave = $price->save();
        if ($pricesave) {
            return redirect('/price')->with("status", "The record has been stored");
        } else {
            return redirect('/price')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::find($id);
        $vehicleType = DB::table('vehicle_type')->get();
        $route = DB::table('route')->get();
        return view('price.edit', compact('price','vehicleType','route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $price = Price::find($id);
        $price->route = request('route');
        $price->vehicleType = request('vehicleType');
        $price->price = request('price');
        $price->children_price = request('children_price');
        $price->special_price = request('special_price');
        $price->save();
        $pricesave = $price->save();
        if ($pricesave) {
            return redirect('/price')->with("status", "The record has been updated");
        } else {
            return redirect('/price')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id)->delete();
        return redirect('/price')->with('status','Deleted Successfully');
    }
}
