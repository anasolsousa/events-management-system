<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function store(StoreClientRequest $request)
    {
        $validated = $request->validated();
        
        $client = Client::create($validated);

        return response()->json([
            'message' => 'Cliente criado com sucesso',
            "client" => $client
        ]);
    }

    public function update(UpdateClientRequest $request, string $id)
    {
        $client = Client::findOrFail($id);
        
        $validated = $request->validated();
        
        $client->update($validated);

        return response()->json([
            'message' => 'Cliente atualizado com sucesso',
            'client' => $client
        ]);
    }
}
