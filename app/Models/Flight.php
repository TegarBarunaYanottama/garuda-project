<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'flight_number',
        'airline_id'
    ];

public function airline()
{
    return $this->belongsTo(Airline::class);
}

    // codeium: Refactor |Explain |Generate Function Comment|X
    public function airport()
    {
        return $this->belongsTo(FlightSegment::class);
    }

    // codeium: Refactor |Explain |Generate Function Comment|X
    public function clasess()
    {
      return $this->hasMany(FlightClass::class);  
    }

    // codeium: Refactor |Explain |Generate Function Comment|X
    public function seats()
    {
      return $this->hasMany(FlightSeat::class);  
    }
}
