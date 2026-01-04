<?php

namespace App\Http\Controllers;

use App\Models\TransactionPassenger;
use Illuminate\Http\Request;

class TransactionPassengerController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 'data' => TransactionPassenger::with('transaction')->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'full_name' => 'required|string|max:100',
            'seat_id' => 'nullable|exists:flight_seats,id',
            'passport_number' => 'nullable|string|max:20',
            'date_of_birth' => 'required|date'
        ]);

        $passenger = TransactionPassenger::create($validated);
        return response()->json(['success' => true, 'message' => 'Penumpang ditambahkan', 'data' => $passenger], 201);
    }

    public function show($id)
    {
        $passenger = TransactionPassenger::with('transaction')->find($id);
        if (!$passenger) return response()->json(['success' => false, 'message' => 'Penumpang tidak ditemukan'], 404);

        return response()->json(['success' => true, 'data' => $passenger]);
    }

    public function update(Request $request, $id)
    {
        $passenger = TransactionPassenger::find($id);
        if (!$passenger) return response()->json(['success' => false, 'message' => 'Penumpang tidak ditemukan'], 404);

        $validated = $request->validate([
            'full_name' => 'sometimes|required|string|max:100',
            'seat_id' => 'nullable|exists:flight_seats,id',
            'passport_number' => 'nullable|string|max:20',
            'date_of_birth' => 'sometimes|required|date'
        ]);

        $passenger->update($validated);
        return response()->json(['success' => true, 'message' => 'Data penumpang diperbarui', 'data' => $passenger]);
    }

    public function destroy($id)
    {
        $passenger = TransactionPassenger::find($id);
        if (!$passenger) return response()->json(['success' => false, 'message' => 'Penumpang tidak ditemukan'], 404);

        $passenger->delete();
        return response()->json(['success' => true, 'message' => 'Penumpang dihapus']);
    }
}
