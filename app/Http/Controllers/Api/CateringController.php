<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catering;
use App\Http\Requests\StoreCateringRequest;


class CateringController extends Controller
{
    public function index()
    {
        $caterings = Catering::all();
        return response()->json($caterings);
    }

    public function store(StoreCateringRequest $request)
    {
        $validated = $request->validated();
        
        $catering = Catering::create($validated);

        return response()->json([
            'message' => 'Catering criado com sucesso',
            "catering" => $catering
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
