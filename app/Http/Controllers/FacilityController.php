<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility; // ✅ IMPORT MODEL FACILITY

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::all(); // ✅ AMBIL DATA UNTUK DITAMPILKAN
        return view('facility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);
        return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('facility.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facility = Facility::findOrFail($id);
        return view('facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $facility = Facility::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);

        $facility->update($validated);

        return redirect()->route('facility.index')->with('success', 'Data fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();

        return redirect()->route('facility.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}