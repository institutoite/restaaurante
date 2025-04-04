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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name',25); // Nombre de la sucursal (ej: "Sucursal Centro")
            $table->string('code',25)->unique(); // Código corto único (ej: "CENTRO")
            $table->string('address',250); // Dirección física completa
            $table->string('phone',15); // Teléfono de contacto
            $table->time('opening_time'); // Hora de apertura (ej: 08:00:00)
            $table->time('closing_time'); // Hora de cierre (ej: 22:00:00)
            $table->boolean('is_active')->default(true); // Sucursal activa/inactiva
            $table->text('description')->nullable(); // Notas adicionales
            $table->timestamps();
            $table->softDeletes(); // Para desactivar sucursales sin eliminarlas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
