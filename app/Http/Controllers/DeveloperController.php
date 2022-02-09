<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Http\Resources\DeveloperResource;

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
        if ($request->hasFile('developer_photo')) {
            $request->developer_photo->storeAs('public/developers', $request->developer_photo->getClientOriginalName());
        }

        if ($request->hasFile('file')) {
            $request->file->storeAs('public/developers', $request->file->getClientOriginalName());
        }

        $developer = Developer::create($request->only([
            'name', 
            'start_work',
            'surname',
            'phone_number',
            'work_type',
            'about',
            'file',
            'developer_photo',
            'workstatus_id',
        ]));

        return new DeveloperResource($developer);
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
        if ($request->hasFile('developer_photo')) {
            $request->developer_photo->storeAs('public/developers', $request->developer_photo->getClientOriginalName());
        }

        if ($request->hasFile('file')) {
            $request->file->storeAs('public/developers/file', $request->file->getClientOriginalName());
        }

        $developer->update($request->only([
            'name', 
            'start_work',
            'surname',
            'phone_number',
            'work_type',
            'about',
            'file',
            'developer_photo',
            'workstatus_id',
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
}
