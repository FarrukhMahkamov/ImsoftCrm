<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    /**
     * Display all clients
     *
     * This method is used to display all clients.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ClientResource::collection(Cache::remember('clients', 60*60*24, function(){
        //     return Client::all();
        // }));

        return ClientResource::collection(Client::with('category', 'activityType', 'state', 'region', 'address', 'operator', 'type')->get());

    }

    /**
     * Store a newly created client in storage.
     *
     * This method is used to create a new client.
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->only([
            'general_info',
            'enterprise_name',
            'category_id',
            'activity_type_id',
            'state_id',
            'region_id',
            'address_id',
            'home_address',
            'order_reason',
            'client_name',
            'client_phone_number',
            'client_phone_number_2',
            'client_born_date',
            'operator_id',
            'operator_phone_number',
            'operator_phone_number_2',
            'operator_born_date',
            'latitude',
            'longtitude',
            'file',
            'type_id',
            'client_status',
            'order_time',   
        ]));

        return new ClientResource($client);
    }

    public function searchByStatus($id)
    {
        return ClientResource::collection(Client::where('client_status', $id)->get());
    }

    /**
     * DIsplay single client
     *
     * This method is used to display a single client.
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified client in storage.
     *
     * This method is used to update an existing client.
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->only([
            'general_info',
            'enterprise_name',
            'category_id',
            'activity_type_id',
            'state_id',
            'region_id',
            'address_id',
            'home_address',
            'order_reason',
            'client_name',
            'client_phone_number',
            'client_phone_number_2',
            'client_born_date',
            'operator_id',
            'operator_phone_number',
            'operator_phone_number_2',
            'operator_born_date',
            'latitude',
            'longtitude',
            'file',
            'type_id',
            'order_time',   
            'client_status',
        ]));

        return new ClientResource($client);
    }

    /**
     * Remove the specified client from storage.
     *
     * This method is used to delete an existing client.
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete($client);

        return response(null, 204);
    }
}
