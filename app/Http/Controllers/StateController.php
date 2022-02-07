<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    /**
    * Display all states
    *
    * This method is used to display all states.
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return StateResource::collection(State::all());
    }
    
    /**
    * Store a newly created state in storage.
    *
    * This method is used to create a new state.    
    * @param  \App\Http\Requests\StoreStateRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreStateRequest $request)
    {
        $state = State::create($request->only('name'));
        
        return new StateResource($state);
    }
    
    /**
    * Display the specified state.
    *
    * This method is used to display a single state.
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function show(State $state)
    {
        return new StateResource($state);
    }
    
    /**
    * Update the specified state in storage.
    *
    * This method is used to update an existing state.
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
    * Remove the specified state from storage.
    *
    * This method is used to delete an existing state.
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function destroy(State $state)
    {
        $state->delete();
        
        return response(null, 204);
    }
}
