<?php

namespace App\Http\Controllers;

use App\Models\ActivityType;
use App\Http\Requests\StoreActivityTypeRequest;
use App\Http\Requests\UpdateActivityTypeRequest;
use App\Http\Resources\ActivityTypeResource;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{
    /**
     * Display all activity types
     * 
     * @response {
     *   'id' = 4,
     *   'category_id' = 2
     * }
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityTypeResource::collection(ActivityType::latest()->paginate(10));
    // return ActivityTypeResource::collection(ActivityType::latest()->get());
    }


    public function allData()
    {
        return ActivityTypeResource::collection(ActivityType::latest()->get());
    }
    /**
     * Store a newly created activity type in storage.
     *
     * This method is used to create a new activity type.
     * @param  \App\Http\Requests\StoreActivityTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivityTypeRequest $request)
    {
        $activityType = ActivityType::create($request->only('name'));

        return new ActivityTypeResource($activityType);
    }

    /**
     * DIsplay single activity type
     * 
     *This method is used to display a single activity type.
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ActivityTypeResource(
            $activityType = ActivityType::findOrFail($id)
        );
    }

    /**
     * Update the specified activity type in storage.
     *
     * This method is used to update an existing activity type.
     * @param  \App\Http\Requests\UpdateActivityTypeRequest  $request
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivityTypeRequest $request, $id)
    {
        $activityType = ActivityType::findOrFail($id);

        $activityType->update($request->only(['name']));
    }

    /**
     * Remove the specified activity type from storage.
     *
     * This method is used to delete an existing activity type.
     * @param  \App\Models\ActivityType  $activityType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            $type = ActivityType::findOrFail($id);
            $type->delete();
        }
    }
}
