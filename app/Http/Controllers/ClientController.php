<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\OnlyClientNameAndIdResource;
use Illuminate\Http\Request;
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
        //     return Client::with('category', 'activityType', 'state', 'region', 'address')->latest()->get();
        // }));

        return ClientResource::collection(Client::with('category', 'activityType', 'state', 'region', 'address')->latest()->get());
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
        $client = Client::create([
            'general_info' => $request->general_info,
            'general_document' => json_encode($request->general_document),
            'enterprise_name' => $request->enterprise_name,
            'category_id' => $request->category_id,
            'activity_type_id' => $request->activity_type_id,
            'state_id' => $request->state_id,
            'region_id' => $request->region_id,
            'address_id' => $request->address_id,
            'home_address' => $request->home_address,
            'order_reason_id' => $request->order_reason_id,
            'order_reason' => $request->order_reason,
            'client_name' => $request->client_name,
            'client_phone_number' => $request->client_phone_number,
            'client_phone_number_2' => $request->client_phone_number_2,
            'client_born_date' => date('Y-m-d', strtotime($request->client_born_date)),
            'operator_name' => $request->operator_name,
            'operator_phone_number' => $request->operator_phone_number,
            'operator_phone_number_2' => $request->operator_phone_number_2,
            'operator_born_date' => date('Y-m-d', strtotime($request->operator_born_date)),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'file_1' => $request->file_1,
            'file_2' => $request->file_2,
            'file_3' => $request->file_3,
            'client_status' => $request->client_status,
            'order_time' => date('Y-m-d', strtotime($request->order_time)),
        ]);


        return new ClientResource($client);
    }

    public function searchByStatus($id)
    {
        return ClientResource::collection(Client::where('client_status', $id)->latest()->get());
    }

    public function searchById()
    {
        return OnlyClientNameAndIdResource::collection(Client::where('client_status', 1)
        ->orWhere('client_status', 2)
        ->latest()->get());
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
    public function update(Request $request, Client $client)
    {
        $client->update([
            'general_info' => $request->general_info,
            'general_document' => json_encode($request->general_document),
            'enterprise_name' => $request->enterprise_name,
            'category_id' => $request->category_id,
            'activity_type_id' => $request->activity_type_id,
            'state_id' => $request->state_id,
            'region_id' => $request->region_id,
            'address_id' => $request->address_id,
            'home_address' => $request->home_address,
            'order_reason_id' => $request->order_reason_id,
            'order_reason' => $request->order_reason,
            'client_name' => $request->client_name,
            'client_phone_number' => $request->client_phone_number,
            'client_phone_number_2' => $request->client_phone_number_2,
            'client_born_date' => date('Y-m-d', strtotime($request->client_born_date)),
            'operator_name' => $request->operator_name,
            'operator_phone_number' => $request->operator_phone_number,
            'operator_phone_number_2' => $request->operator_phone_number_2,
            'operator_born_date' => date('Y-m-d', strtotime($request->operator_born_date)),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'file_1' => $request->file_1,
            'file_2' => $request->file_2,
            'file_3' => $request->file_3,
            'client_status' => $request->client_status,
            'order_time' => date('Y-m-d', strtotime($request->order_time)),
        ]);

            
        return new ClientResource($client);
    }

    /**
     * Remove the specified client from storage.
     *
     * This method is used to delete an existing client.
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function deleteClient(Request $request)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            $state = Client::findOrFail($id);
            $state->delete();
        }
    }

    public function storeImage(ImageUploadRequest $request)
    {
    
        if ($request->file('file')) {
            $file_1 = $request->file('file')->move('images/client/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());
            
            return $file_1;
        }
    }

    public function deletePhoto(Request $request)
    {
          if ($request->type) {
            if (file_exists($request->filename)) {
                unlink($request->filename);
            }
        }
    }
}

