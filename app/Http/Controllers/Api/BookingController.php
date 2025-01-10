<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;


class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();
        
        $booking = Booking::create($validated);

        return response()->json([
            'message' => 'Reserva criada com sucesso',
            "booking" => $booking
        ], 201);
    }

    public function update(UpdateBookingRequest $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        
        $validated = $request->validated();
        
        $booking->update($validated);

        $booking->load(['local', 'catering']);

        return response()->json([
            'message' => 'Reserva atualizada com sucesso',
            'booking' => $booking
        ], 200);
    }

    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        
        $booking->delete();

        return response()->json([
            "message"=>"Reserva eliminada com sucesso",
            'booking' => $booking
        ]);
    }
}
