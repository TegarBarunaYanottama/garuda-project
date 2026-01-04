<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'seat_row',
        'seat_number',
        'status',
        'passenger_name',
        'passenger_email',
    ];

    // Accessor untuk seat_code (gabungan row + number)
    public function getSeatCodeAttribute()
    {
        return $this->seat_row . $this->seat_number;
    }
}