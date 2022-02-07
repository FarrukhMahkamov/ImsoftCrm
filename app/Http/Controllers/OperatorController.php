<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Http\Resources\OperatorResource;

class OperatorController extends Controller
{
    /**
     * Display all operators
     *
     * This method is used to display all operators.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OperatorResource::collection(Operator::all());
    }

    /**
     * Store a newly created operator in storage.
     *
     * This method is used to create a new operator.
     * @param  \App\Http\Requests\StoreOperatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatorRequest $request)
    {
        $operator = Operator::create($request->only(['name']));

        return new OperatorResource($operator);
    }

    /**
     * DIsplay single operator
     *
     * This method is used to display a single operator.
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        return new OperatorResource($operator);
    }

    /**
     * Update the specified operator in storage.
     *
     * This method is used to update an existing operator.
     * @param  \App\Http\Requests\UpdateOperatorRequest  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatorRequest $request, Operator $operator)
    {
        $operator->update($request->only([
            'name'
        ]));

        return new OperatorResource($operator);
    }

    /**
     * Remove the specified operator from storage.
     * 
     * This method is used to delete an existing operator.
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();

        return response(null, 204);
    }
}
