<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CashRegister extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'name',
        'code',
        'initial_balance',
        'current_balance',
        'is_open',
        'last_opened_at',
        'last_closed_at'
    ];

    protected $casts = [
        'initial_balance' => 'decimal:2',
        'current_balance' => 'decimal:2',
        'is_open' => 'boolean',
        'last_opened_at' => 'datetime',
        'last_closed_at' => 'datetime'
    ];

    // Relación con sucursal
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    // Relación con movimientos de caja
    public function movements(): HasMany
    {
        return $this->hasMany(CashRegisterMovement::class);
    }

    // Método para abrir caja
    public function open(float $initialBalance, int $userId): void
    {
        $this->update([
            'is_open' => true,
            'initial_balance' => $initialBalance,
            'current_balance' => $initialBalance,
            'last_opened_at' => now()
        ]);

        $this->movements()->create([
            'user_id' => $userId,
            'type' => 'open',
            'amount' => $initialBalance,
            'description' => 'Apertura de caja'
        ]);
    }

    // Método para cerrar caja
    public function close(int $userId): void
    {
        $this->update([
            'is_open' => false,
            'last_closed_at' => now()
        ]);

        $this->movements()->create([
            'user_id' => $userId,
            'type' => 'close',
            'amount' => $this->current_balance,
            'description' => 'Cierre de caja'
        ]);
    }
}
