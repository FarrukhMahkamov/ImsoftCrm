<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Http\Resources\DeveloperResource;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    
    /**
    * Display all developers
    *
    * This method is used to display all developers.
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return DeveloperResource::collection(Developer::all());
    }
    
    /**
    * Store a newly created developer in storage.
    *
    * This method is used to create a new developer.
    * @param  \App\Http\Requests\StoreDeveloperRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreDeveloperRequest $request)
    {
        $developer = new Developer;
        $developer->fill($request->only([
            'name',
            'passport',
            'family',
            'developer_photo',
            'born_date',
            'phone_number',
            'work_type_id',
            'about',
        ]));
        
        $developer->pasport = $request
        ->file('pasport')
        ->move('images/pasport', time().'.'.$request
        ->file('pasport')
        ->getClientOriginalName());
        
        $developer->family = $request
        ->file('family')
        ->move('images/family', time().'.'.$request
        ->file('family')->getClientOriginalName());
        
        $developer->developer_photo = $request
        ->file('developer_photo')
        ->move('images/developer_photo', time().'.'.$request
        ->file('developer_photo')->getClientOriginalName());
        
        $developer->save();
        
        if ($developer) {
            return new DeveloperResource($developer);
        } else {
            return response()->json([
                'message' => 'Error'
            ], 500);
        }
    }
        
    /**
    * DIsplay single developer
    *
    * This method is used to display a single developer.
    * @param  \App\Models\Developer  $developer
    * @return \Illuminate\Http\Response
    */
    public function show(Developer $developer)
    {
        return new DeveloperResource($developer);
    }
        
    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateDeveloperRequest  $request
    * @param  \App\Models\Developer  $developer
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $developer->pasport = $request
            ->file('pasport')
            ->move('images/pasport', time().'.'.$request
            ->file('pasport')
            ->getClientOriginalName());
            
        $developer->family = $request
            ->file('family')
            ->move('images/family', time().'.'.$request
            ->file('family')->getClientOriginalName());
            
        $developer->developer_photo = $request
            ->file('developer_photo')
            ->move('images/developer_photo', time().'.'.$request
            ->file('developer_photo')->getClientOriginalName());
            
        $developer->update($request->only([
                'name',
                'passport',
                'family',
                'developer_photo',
                'born_date',
                'phone_number',
                'work_type_id',
                'about',
            ]));
            
        if ($developer) {
            return new DeveloperResource($developer);
        } else {
            return response()->json([
                'message' => 'Something went wrong, please try again'
            ], 500);
        }
    }
        
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Developer  $developer
    * @param  \App\Models\Developer  $developer
    * @return \Illuminate\Http\Response
    */
    public function destroy(Developer $developer)
    {
        $developer->delete();
            
        return response(null, 204);
    }
}
