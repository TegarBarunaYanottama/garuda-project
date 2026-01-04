<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'code',
        'discount_type',
        'discount',
        'valid_until',
        'is_used',
    ];

    // codeium Refactor |Explain |Generate Function Comment |X
    public function transactions()
    {
      return $this->hasOne(Transaction::class);
    }
}
