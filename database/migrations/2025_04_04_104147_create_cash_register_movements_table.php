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
        Schema::create('cash_register_movements', function (Blueprint $table) {
            $table->id();
            
            // Relaciones
            $table->foreignId('cash_register_id')
                ->constrained()
                ->onDelete('cascade');
                
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            
            // Datos del movimiento
            $table->enum('type', [
                'open',       // Apertura
                'close',      // Cierre
                'income',     // Ingreso
                'expense',    // Egreso
                'sale',       // Venta
                'sale_cancel',// Cancelación venta
                'adjustment', // Ajuste
                'transfer_in', // Transferencia entrada
                'transfer_out' // Transferencia salida
            ]);
            
            $table->decimal('amount', 12, 2);
            $table->string('reference')->nullable(); // Número de factura/transacción
            $table->text('description')->nullable();
            
            // Metadata
            $table->json('details')->nullable(); // Datos adicionales estructurados
            $table->timestamps();
            
            // Índices
            $table->index(['cash_register_id', 'created_at']);
            $table->index('type');
        });
    }






    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_register_movements');
    }
};
