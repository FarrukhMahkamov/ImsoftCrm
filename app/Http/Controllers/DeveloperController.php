<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Http\Resources\DeveloperResource;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeveloperResource::collection(Developer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeveloperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeveloperRequest $request, Developer $developer)
    {
        $developer = Developer::create($request->only([
            'name', 
            'start_work',
            'surname',
            'phone_number',
            'work_type',
            'about',
            'file',
            'workstatus_id',
        ]));

        return new DeveloperResource($developer);
    }

    /**
     * Display the specified resource.
     *
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
        $developer->update($request->only([
            'name', 
            'start_work',
            'surname',
            'phone_number',
            'work_type',
            'about',
            'file',
            'workstatus_id',
        ]));

        return new DeveloperResource($developer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();

        return response(null, 204);
    }
}
