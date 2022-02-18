<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Http\Resources\RegionResource;
use Illuminate\Http\Request;

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

    public function getSelectedRegion($id)
    {
        $state = Region::findOrFail($id); 
        return response()->json([
            'data' => [
                new RegionResource($state)
            ]
        ]);
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
    public function show(Region $region, $id)
    {
        $region = Region::findOrFail($id);
        return RegionResource::collection($region->with('state')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * This method is used to update an existing region.
     * @param  \App\Http\Requests\UpdateRegionRequest  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, $id)
    {
        $region = Region::findOrFail($id);
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
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            $type = Region::findOrFail($id);
            $type->delete();
        }
    }
}
