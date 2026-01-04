<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airline;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with('airline')->get();
        return view('flight.index', compact('flights'));
    }

    public function create()
    {
        $airlines = Airline::all();
        return view('flight.create', compact('airlines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'flight_number' => 'required|unique:flights,flight_number',
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'base_price' => 'required|numeric',
            'status' => 'required|in:scheduled,delayed,cancelled,completed',
        ]);

        Flight::create($request->all());

        return redirect()->route('flight.index')->with('success', 'Flight berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $airlines = Airline::all();
        return view('flight.edit', compact('flight', 'airlines'));
    }

    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'flight_number' => 'required|unique:flights,flight_number,' . $id,
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'base_price' => 'required|numeric',
            'status' => 'required|in:scheduled,delayed,cancelled,completed',
        ]);

        $flight->update($request->all());

        return redirect()->route('flight.index')->with('success', 'Flight berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Flight::findOrFail($id)->delete();
        return redirect()->route('flight.index')->with('success', 'Flight berhasil dihapus.');
    }
}
