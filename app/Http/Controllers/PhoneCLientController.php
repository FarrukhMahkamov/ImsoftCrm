<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhoneClientResource;
use App\Models\PhoneClient;
use Illuminate\Http\Request;

class PhoneCLientController extends Controller
{
    public function index()
    {
        return PhoneClientResource::collection(PhoneClient::with('client')->get());
    }

    public function show($id)
    {
        $phoneClient = PhoneClient::findOrdFail($id);
        return new PhoneClientResource($phoneClient);
    }

    public function store(Request $request)
    {
        $phoneClient = PhoneClient::create($request->all());
        return new PhoneClientResource($phoneClient);
    }

    public function update(Request $request, $id)
    {
        $phoneClient = PhoneClient::findOrFail($id);
        $phoneClient->update($request->all());

        if ($phoneClient) {
            return new PhoneClientResource($phoneClient);
        } else {
            return response(0)->json([
                'message' => 'Phone client  `not updated or created'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->getContent();
    
        foreach (json_decode($ids) as $id) {
            $state = PhoneClient::findOrFail($id);
            $state->delete();
        }

        return response()->json([
            'message' => 'Selected client deleted successfully'
        ]);

       
    }
}
