<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Resources\RegionResource;

class RegionController extends Controller
{
    /**
     * Display all regions
     *
     * This method is used to display all regions.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RegionResource::collection(Region::latest()->get());
    }
    public function getAll()
    {
        return RegionResource::collection(Region::latest()->get());
    }
    /**
     * Store a newly created resource in storage.
     * 
     *  This method is used to create a new region.
     * @param  \App\Http\Requests\StoreRegionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
       $region = Region::create($request->only([
            'name',
            'state_id'
        ]));

        return new RegionResource($region);
    }

    /**
     * Display the specified resource.
     *
     * This method is used to display a single region.
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return new RegionResource($region);
    }

    /**
     * Update the specified resource in storage.
     *
     * This method is used to update an existing region.
     * @param  \App\Http\Requests\UpdateRegionRequest  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->only([
            'name',
            'state_id',
        ]));

        return new RegionResource($region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * This method is used to delete an existing region.
     * @param  \App\Models\Region  $region
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return response(null, 204);
    }
}
