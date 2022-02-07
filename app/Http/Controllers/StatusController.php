<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;

class StatusController extends Controller
{
    /**
     * Display all statuses
     *
     * This method is used to display all statuses.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return StatusResource::collection(Status::all());
    }

    /**
     * Store a newly created status in storage.
     *
     * This method is used to create a new status.
     * @param  \App\Http\Requests\StoreStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRequest $request, Status $status)
    {
       $status = Status::create($request->only('name'));

        return new StatusResource($status);
    }

    /**
     * Display the specified status.
     *
     * This method is used to display a single status.
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return new StatusResource($status);
    }

    /**
     * Update the specified status in storage.
     *
     * This method is used to update an existing status.
     * @param  \App\Http\Requests\UpdateStatusRequest  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->only('name'));

        return new StatusResource($status);
    }

    /**
     * Remove the specified status from storage.
     *
     * This method is used to delete an existing status.
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return response(null, 204);
    }
}
