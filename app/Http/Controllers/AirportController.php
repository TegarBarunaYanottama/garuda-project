<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Airport; // Asumsi model bernama Airport

class AirportController extends Controller
{
    public function create()
    {
        return view('airport.create'); // Laravel pakai titik, bukan slash
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'iata_code' => 'required|size:3|alpha|uppercase|unique:airports,iata_code',
            'name'      => 'required|min:3',
            'city'      => 'required|min:2',
            'country'   => 'required|min:2',
        ], [
            'iata_code.required' => 'Kode IATA wajib diisi.',
            'iata_code.size' => 'Kode IATA harus terdiri dari 3 karakter.',
            'iata_code.alpha' => 'Kode IATA hanya boleh berisi huruf.',
            'iata_code.uppercase' => 'Kode IATA harus dalam huruf kapital.',
            'iata_code.unique' => 'Kode IATA sudah digunakan, silakan pilih kode lain.',
            'name.required' => 'Nama Bandara wajib diisi.',
            'name.min' => 'Nama Bandara minimal 3 karakter.',
            'city.required' => 'Kota wajib diisi.',
            'city.min' => 'Kota minimal 2 karakter.',
            'country.required' => 'Negara wajib diisi.',
            'country.min' => 'Negara minimal 2 karakter.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Airport::create($validator->validated());
            return redirect()->route('airport.create')->with('success', 'Bandara berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}