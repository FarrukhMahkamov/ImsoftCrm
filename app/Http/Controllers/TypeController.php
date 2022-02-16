<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\TypeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

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
        return TypeResource::collection(Type::latest()->get());
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
    public function update(UpdateTypeRequest $request, $id)
    {
        $type = Type::findOrFail($id);

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
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            $type = Type::findOrFail($id);
            $type->delete();
        }
    }
}