<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightClass;

class FlightClassController extends Controller
{
    public function index()
    {
        $flightClasses = FlightClass::all();
        return view('flight_class.index', compact('flightClasses'));
    }

    public function create()
    {
        return view('flight_class.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        FlightClass::create($validated);

        return redirect()->route('flight_class.index')
                         ->with('success', 'Kelas penerbangan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $flightClass = FlightClass::findOrFail($id);
        return view('flight_class.show', compact('flightClass'));
    }

    public function edit(string $id)
    {
        $flightClass = FlightClass::findOrFail($id);
        return view('flight_class.edit', compact('flightClass'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $flightClass = FlightClass::findOrFail($id);
        $flightClass->update($validated);

        return redirect()->route('flight_class.index')
                         ->with('success', 'Kelas penerbangan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $flightClass = FlightClass::findOrFail($id);
        $flightClass->delete();

        return redirect()->route('flight_class.index')
                         ->with('success', 'Kelas penerbangan berhasil dihapus!');
    }
}