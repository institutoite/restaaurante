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
        Schema::create('branch_user', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->constrained()  // Relaciona con tabla users
            ->onDelete('cascade');  // Elimina en cascada si se borra usuario
        
            $table->foreignId('branch_id')
                ->constrained()  // Relaciona con tabla branches
                ->onDelete('cascade');  // Elimina en cascada si se borra sucursal
            
            // Campos adicionales para la tabla pivote
            $table->boolean('is_active')->default(true);
            $table->date('assigned_at')->default(now());
            $table->date('unassigned_at')->nullable();
            $table->text('assignment_notes')->nullable();
            
            // Llave primaria compuesta (evita duplicados)
            $table->primary(['user_id', 'branch_id']);
            
            // Índices para mejorar rendimiento en consultas comunes
            $table->index(['user_id', 'is_active']);
            $table->index(['branch_id', 'is_active']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_user');
    }
};
