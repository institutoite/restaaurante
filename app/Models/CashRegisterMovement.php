<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashRegisterMovement extends Model
{
    use HasFactory;
    protected $fillable = [
        'cash_register_id',
        'user_id',
        'type',
        'amount',
        'reference',
        'description',
        'details'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'details' => 'json'
    ];

    public function cashRegister(): BelongsTo
    {
        return $this->belongsTo(CashRegister::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
