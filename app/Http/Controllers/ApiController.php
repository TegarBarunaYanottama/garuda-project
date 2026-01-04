<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Contoh endpoint untuk mengecek apakah API berjalan
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Selamat datang di Garuda Project API!',
            'data' => null
        ], 200);
    }

    /**
     * Contoh endpoint POST untuk menerima data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi input (opsional)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Simpan ke database (contoh hanya kembalikan data)
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diterima',
            'data' => $validated
        ], 201);
    }

    public function show()
    {
        return response()->json([
        'message' => 'Resource not found'
        ], 404);
    }
}