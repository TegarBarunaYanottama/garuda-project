<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'flight', 'promoCode'])->get();
        return response()->json(['success' => true, 'data' => $transactions]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'flight_id' => 'required|exists:flights,id',
            'total_price' => 'required|numeric|min:0',
            'promo_code_id' => 'nullable|exists:promo_codes,id',
            'status' => 'required|string|in:pending,paid,cancelled'
        ]);

        $transaction = Transaction::create($validated);
        return response()->json(['success' => true, 'message' => 'Transaksi berhasil dibuat', 'data' => $transaction]);
    }

    public function show($id)
    {
        $transaction = Transaction::with(['user', 'flight', 'promoCode'])->find($id);
        if (!$transaction) return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan'], 404);

        return response()->json(['success' => true, 'data' => $transaction]);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan'], 404);

        $validated = $request->validate([
            'status' => 'sometimes|required|string|in:pending,paid,cancelled'
        ]);

        $transaction->update($validated);
        return response()->json(['success' => true, 'message' => 'Transaksi diperbarui', 'data' => $transaction]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan'], 404);

        $transaction->delete();
        return response()->json(['success' => true, 'message' => 'Transaksi dihapus']);
    }
}
