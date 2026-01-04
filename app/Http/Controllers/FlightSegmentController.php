<?php

namespace App\Http\Controllers;

use App\Models\FlightSegment;
use Illuminate\Http\Request;

class FlightSegmentController extends Controller
{
    public function index()
    {
        $segments = FlightSegment::with(['flight', 'originAirport', 'destinationAirport'])->get();
        return response()->json(['success' => true, 'data' => $segments]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'origin_airport_id' => 'required|exists:airports,id',
            'destination_airport_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        $segment = FlightSegment::create($validated);
        return response()->json(['success' => true, 'message' => 'Segmen penerbangan berhasil ditambahkan', 'data' => $segment]);
    }

    public function show($id)
    {
        $segment = FlightSegment::with(['flight', 'originAirport', 'destinationAirport'])->find($id);
        if (!$segment) return response()->json(['success' => false, 'message' => 'Segmen tidak ditemukan'], 404);

        return response()->json(['success' => true, 'data' => $segment]);
    }

    public function update(Request $request, $id)
    {
        $segment = FlightSegment::find($id);
        if (!$segment) return response()->json(['success' => false, 'message' => 'Segmen tidak ditemukan'], 404);

        $validated = $request->validate([
            'origin_airport_id' => 'sometimes|required|exists:airports,id',
            'destination_airport_id' => 'sometimes|required|exists:airports,id',
            'departure_time' => 'sometimes|required|date',
            'arrival_time' => 'sometimes|required|date|after:departure_time',
        ]);

        $segment->update($validated);
        return response()->json(['success' => true, 'message' => 'Segmen penerbangan diperbarui', 'data' => $segment]);
    }

    public function destroy($id)
    {
        $segment = FlightSegment::find($id);
        if (!$segment) return response()->json(['success' => false, 'message' => 'Segmen tidak ditemukan'], 404);

        $segment->delete();
        return response()->json(['success' => true, 'message' => 'Segmen dihapus']);
    }
}
