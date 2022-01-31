<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return StateResource::collection(State::all());
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreStateRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreStateRequest $request)
    {
        $state = State::create($request->only('name'));
        
        return new StateResource($state);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function show(State $state)
    {
        return new StateResource($state);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateStateRequest  $request
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateStateRequest $request, State $state)
    {
        $state->update($request->only('name'));
        
        return new StateResource($state);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function destroy(State $state)
    {
        $state->delete();
        
        return response(null, 204);
    }
}
