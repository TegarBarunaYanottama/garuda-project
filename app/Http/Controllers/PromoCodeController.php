<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true, 'data' => PromoCode::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:promo_codes,code',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'valid_until' => 'required|date'
        ]);

        $promo = PromoCode::create($validated);
        return response()->json(['success' => true, 'message' => 'Kode promo dibuat', 'data' => $promo]);
    }

    public function show($id)
    {
        $promo = PromoCode::find($id);
        if (!$promo) return response()->json(['success' => false, 'message' => 'Kode promo tidak ditemukan'], 404);

        return response()->json(['success' => true, 'data' => $promo]);
    }

    public function update(Request $request, $id)
    {
        $promo = PromoCode::find($id);
        if (!$promo) return response()->json(['success' => false, 'message' => 'Kode promo tidak ditemukan'], 404);

        $validated = $request->validate([
            'discount_percentage' => 'sometimes|required|numeric|min:0|max:100',
            'valid_until' => 'sometimes|required|date'
        ]);

        $promo->update($validated);
        return response()->json(['success' => true, 'message' => 'Kode promo diperbarui', 'data' => $promo]);
    }

    public function destroy($id)
    {
        $promo = PromoCode::find($id);
        if (!$promo) return response()->json(['success' => false, 'message' => 'Kode promo tidak ditemukan'], 404);

        $promo->delete();
        return response()->json(['success' => true, 'message' => 'Kode promo dihapus']);
    }
}
