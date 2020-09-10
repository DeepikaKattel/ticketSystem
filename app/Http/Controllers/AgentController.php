<?php

namespace App\Http\Controllers;

use App\Model\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agent = Agent::orderBy('id');
        if($request->session()->has('globalPageLimit') &&
            strtolower($request->session()->get('globalPageLimit')) === "all"){
            $agent = $agent->Paginate($agent->count());
        }
        else{
            $agent = $agent->Paginate($request->session()->get('globalPageLimit')?:5);
        }
        return view('agent.index', compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agent = new Agent();
        $agent->name = request('name');
        $agent->phoneNumber = request('phoneNumber');
        $agent->save();
        $agentsave = $agent->save();
        if ($agentsave) {
            return redirect('/agent')->with("status", "The record has been stored");
        } else {
            return redirect('/agent')->with("error", "There is an error");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);
        $agent->name = request('name');
        $agent->phoneNumber = request('phoneNumber');
        $agent->save();
        $agentave = $agent->save();
        if ($agentave) {
            return redirect('/agent')->with("status", "The record has been updated");
        } else {
            return redirect('/agent')->with("error", "There is an error");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id)->delete();
        return redirect('/agent')->with('status','Deleted Successfully');
    }
}
