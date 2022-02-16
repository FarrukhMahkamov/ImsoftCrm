<?php

namespace App\Http\Controllers;

use App\Models\Reklama;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReklamaResource;

class ReklamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReklamaResource::collection(Reklama::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reklama = Reklama::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ReklamaResource(Reklama::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reklama = Reklama::findorfail($id);
        $reklama->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            Reklama::findorfail($id)->delete();
        }
    }
}
