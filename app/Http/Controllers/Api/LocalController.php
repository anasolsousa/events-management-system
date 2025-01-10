<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocalRequest;
use App\Models\Local;

class LocalController extends Controller
{
    public function index()
    {
        $local = Local::all();
        return response()->json($local);
    }

    public function store(StoreLocalRequest $request)
    {
        $validated = $request->validated();
        
        $local = Local::create($validated);

        return response()->json([
            'message' => 'Local criado com sucesso',
            "local" => $local
        ]);
    }
}
