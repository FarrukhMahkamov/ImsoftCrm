<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\TypeResource;

class TypeController extends Controller
{
    /**
     * Display all types
     * 
     * This method is used to display all types.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TypeResource::collection(Type::all());
    }

    /**
     * Store a newly created type in storage.
     *
     * This method is used to create a new type.
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $type = Type::create($request->only([
            'name'
        ]));

        return new TypeResource($type);
    }

    /**
     * Display the specified type.
     *
     * This method is used to display a single type.
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return new TypeResource($type);
    }

    /**
     * Update the specified type in storage.
     * 
     * This method is used to update an existing type.
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->only([
            'name'
        ]));

        return new TypeResource($type);
    }

    /**
     * Remove the specified type from storage.
     *
     * This method is used to delete an existing type.
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return response(null, 204);
    }
}
