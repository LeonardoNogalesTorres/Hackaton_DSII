<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                                    // Título [cite: 274]
            $table->text('descripcion');                                  // Descripción [cite: 275]
            $table->string('tipo_incidente');                             // Tipo de incidente [cite: 276]
            $table->enum('estado', ['Pendiente', 'En proceso', 'Resuelto'])->default('Pendiente'); // Estado [cite: 278, 286, 287, 288]
            $table->string('responsable_asignado')->nullable();          // Asignar responsables (Coordinador) [cite: 297]
            $table->string('rol_usuario_registra');                       // Rol: Operador o Coordinador [cite: 291, 294]
            $table->timestamps();                                         // Fecha y hora automáticas [cite: 277]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidentes');
    }
};
