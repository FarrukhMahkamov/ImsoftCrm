<?php

namespace App\Http\Controllers;

use App\Models\Developers;
use App\Http\Requests\StoreDevelopersRequest;
use App\Http\Requests\UpdateDevelopersRequest;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDevelopersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDevelopersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Developers  $developers
     * @return \Illuminate\Http\Response
     */
    public function show(Developers $developers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevelopersRequest  $request
     * @param  \App\Models\Developers  $developers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevelopersRequest $request, Developers $developers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Developers  $developers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developers $developers)
    {
        //
    }
}
