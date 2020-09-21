<?php

namespace App\Http\Controllers;


use App\Model\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $route = Route::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $route = $route->Paginate($route->count());
        }
        else{
            $route = $route->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('route.index', compact('route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination = DB::table('destinations')->get();
        return view('route.create', compact('destination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = new Route();
        $route->start_point = request('start_point');
        $route->end_point = request('end_point');
        $route->name = $route->start_point - $route->end_point;
        $route->stoppage_points = request('stoppage_points');
        $route->distance = request('distance');
        $route->child_seat = request('child_seat');
        $route->special_seat = request('special_seat');
        $route->save();
        $routesave = $route->save();
        if ($routesave) {
            return redirect('/route')->with("status", "The record has been stored");
        } else {
            return redirect('/route')->with("error", "There is an error");
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
        $route = Route::find($id);
        $destination = DB::table('destinations')->get();
        return view('route.edit', compact('route','destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        $route = Route::find($id);
        $route->start_point = request('start_point');
        $route->end_point = request('end_point');
        $route->stoppage_points = request('stoppage_points');
        $route->distance = request('distance');
        $route->child_seat = request('child_seat');
        $route->special_seat = request('special_seat');
        $route->save();
        $routesave = $route->save();
        if ($routesave) {
            return redirect('/route')->with("status", "The record has been updated");
        } else {
            return redirect('/route')->with("error", "There is an error");
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
        $route= Route::find($id)->delete();
        return redirect('/route')->with('status','Deleted Successfully');
    }

    public function status($id){
        $data=Route::find($id);

        if($data->status==0){
            $data->status=1;
        }else{
            $data->status=0;
        }

        $data->save();
        return redirect()->back()->with('message', 'Status of'.' '.$data->name.' '.'has been changed successfully');

    }
}
