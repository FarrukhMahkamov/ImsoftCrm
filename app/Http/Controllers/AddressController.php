<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display all addresses
     *
     * This method is used to display all addresses.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(Address::with('region')->latest()->paginate(10));
    }


    public function getAllDistricts()
    {
        return AddressResource::collection(Address::with('region')->latest()->get());
    }
    /**
     * Store a newly created address in storage.
     *
     * This method is used to create a new address.
     * @param  \App\Http\Requests\StoreAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->only([
            'name',
            'region_id',
            'state_id'
        ]));

        return new AddressResource($address);
    }

    /**
     * DIsplay single address
     *
     * This method is used to display a single address.
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Update the specified address in storage.
     *
     * This method is used to update an existing address.
     * @param  \App\Http\Requests\UpdateAddressRequest  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->only([
            'name',
            'region_id'
        ]));

        return new AddressResource($address);
    }

    /**
     * Remove the specified address from storage.
     *
     * This method is used to delete an existing address.
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach(json_decode($ids) as $id) {
            $address = Address::findOrFail($id);
            $address->delete();
        }
    }
}
