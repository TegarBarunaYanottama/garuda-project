<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;

class FlightSeatController extends Controller
{
    public function index()
    {
        $flightNumber = 'GA123';
        $seats = Seat::where('flight_number', $flightNumber)->get();

        if ($seats->isEmpty()) {
            $this->seedSeats($flightNumber);
            $seats = Seat::where('flight_number', $flightNumber)->get();
        }

        return view('flight_seat', [
            'seats' => $seats,
            'flightNumber' => $flightNumber
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'passenger_name' => 'required|string|max:100',
            'passenger_email' => 'required|email',
        ]);

        $seat = Seat::findOrFail($validated['seat_id']);

        if ($seat->status !== 'available') {
            return redirect()->back()->with('error', 'Kursi ini sudah dipesan!');
        }

        $seat->update([
            'status' => 'booked',
            'passenger_name' => $validated['passenger_name'],
            'passenger_email' => $validated['passenger_email'],
        ]);

        // Gunakan seat_code yang di-generate via accessor
        return redirect()->back()->with('success', 'Kursi berhasil dipesan! Kursi Anda: ' . $seat->seat_code);
    }

    /**
     * Generate 30 kursi (6 baris x 5 kolom)
     */
    private function seedSeats($flightNumber)
    {
        $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
        $numbers = [1, 2, 3, 4, 5];

        foreach ($rows as $row) {
            foreach ($numbers as $num) {
                Seat::create([
                    'flight_number' => $flightNumber,
                    'seat_row' => $row,
                    'seat_number' => $num,
                    'status' => 'available',
                ]);
            }
        }
    }
}