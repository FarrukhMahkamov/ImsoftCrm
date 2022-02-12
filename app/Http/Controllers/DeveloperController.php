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
        $this->storeFiles('passport', 'passport', $request);
        $this->storeFiles('family', 'family', $request);
        $this->storeFiles('developer_photo', 'family', $request);

        if($request->hasFile('passport')) {
            $request->passport = $request->passport->store('public/developers/passport');
        }

        if($request->hasFile('developer_photo')) {
            $request->developer_photo = $request->developer_photo->store('public/developers/developer_photo');
        }
        
        $developer = Developer::create($request->only([
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
                'message' => 'Error creating developer',
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
        $this->storeFiles('passport', 'passport', $request);
        $this->storeFiles('family', 'family', $request);
        $this->storeFiles('developer_photo', 'family', $request);

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

        return new DeveloperResource($developer);
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

    protected function storeFiles($data, $path, $request) 
    {
        if($request->hasFile($data)) {
            $request->$data = $request->$data->store('public/developers/$path');
        }
    }
}
