<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AirlineController extends Controller
{
    /**
     * Display a listing of the airlines.
     */
    public function index(): JsonResponse
    {
        $airlines = Airline::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar maskapai berhasil diambil.',
            'data' => $airlines
        ]);
    }

    /**
     * Store a newly created airline in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'code' => 'required|string|max:3|unique:airlines,code',
                'name' => 'required|string|max:255',
                'country' => 'nullable|string|max:255',
            ]);

            $airline = Airline::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Maskapai berhasil ditambahkan.',
                'data' => $airline
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified airline.
     */
    public function show(string $id): JsonResponse
    {
        $airline = Airline::find($id);

        if (!$airline) {
            return response()->json([
                'success' => false,
                'message' => 'Maskapai tidak ditemukan.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail maskapai ditemukan.',
            'data' => $airline
        ]);
    }

    /**
     * Update the specified airline in storage.
     */
    public function update(Request $request, string $id): JsonResponse
{
    $airline = Airline::find($id);

    if (!$airline) {
        return response()->json([
            'success' => false,
            'message' => 'Maskapai tidak ditemukan.',
            'data' => null
        ], 404);
    }

    // Validasi hanya pada field yang dikirim
    $validated = $request->validate([
        'code' => 'sometimes|string|max:3',
        'name' => 'sometimes|string|max:255',
        'country' => 'nullable|string|max:255',
    ]);

    $airline->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Data maskapai berhasil diperbarui.',
        'data' => $airline->fresh() // Mengambil data terbaru dari database
    ]);
}

    /**
     * Remove the specified airline from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $airline = Airline::find($id);

        if (!$airline) {
            return response()->json([
                'success' => false,
                'message' => 'Maskapai tidak ditemukan.',
                'data' => null
            ], 404);
        }

        $airline->delete();

        return response()->json([
            'success' => true,
            'message' => 'Maskapai berhasil dihapus.',
            'data' => null
        ]);
    }
}