<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Http\Resources\StateResource;
use Illuminate\Http\Request;

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
        return StateResource::collection(State::latest()->get());
    }
    
    public function getAll()
    {
        return StateResource::collection(State::latest()->get());
    }
    
    /**
    *  Show cities by state id
    */
    public function getSelectedState($id)
    {
        $state = State::findOrFail($id);
        $selectedState = $state->region;
        
        return StateResource::collection($selectedState);
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
        
        return response()->json([
            'data' => 'Vilayat muvaffaqiyatli yaratildi',
            'state' => $state
        ], 201);
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
        $state = $state->region;
        return StateResource::collection($state);
    }
    
    /**
    * Update the specified state in storage.
    *
    * This method is used to update an existing state.
    * @param  \App\Http\Requests\UpdateStateRequest  $request
    * @param  \App\Models\State  $state
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateStateRequest $request, $id)
    {
        $state = State::findOrFail($id);
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
    public function destroy(Request $request)
    {
        $ids = $request->getContent();
    
        foreach (json_decode($ids) as $id) {
            if (State::findOrFail($id)->region->count() > 0) {
                return response()->json([
                        'errors' => 'Vilayat ichidagi shaharlarni ochiring'
                    ], 422);
            }
            
            $state = State::findOrFail($id);
            $state->delete();
        }
    }
}
