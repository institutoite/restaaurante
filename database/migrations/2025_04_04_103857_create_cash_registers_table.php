<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cash_registers', function (Blueprint $table) {
            $table->id(); // ID único de caja
            
            // Relación con sucursal
            $table->foreignId('branch_id')
                ->constrained('branches')
                ->onDelete('cascade'); // Elimina cajas si se borra la sucursal
            
            // Datos identificadores
            $table->string('name', 50); // Nombre descriptivo (ej: "Caja Principal")
            $table->string('code', 20)->unique(); // Código único (ej: "CAJA1-CENTRO")
            
            // Control de saldos
            $table->decimal('initial_balance', 12, 2)->default(0); // Saldo inicial
            $table->decimal('current_balance', 12, 2)->default(0); // Saldo actual
            
            // Estado de la caja
            $table->boolean('is_open')->default(false); // Abierta/cerrada
            $table->timestamp('last_opened_at')->nullable(); // Fecha última apertura
            $table->timestamp('last_closed_at')->nullable(); // Fecha último cierre
            
            // Auditoría
            $table->timestamps();
            
            // Índices para mejor performance
            $table->index(['branch_id', 'is_open']);
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_registers');
    }
};
