<?php

namespace App\Models;

use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPassenger extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'flight_seat_id',
        'name',
        'date_of_birth',
        'nationality',
    ];

    // codeium Refactor |Explain |Generate Function Comment |X
    public function transaction()
    {
      return $this->hasMany(Transaction::class);
    }
}
