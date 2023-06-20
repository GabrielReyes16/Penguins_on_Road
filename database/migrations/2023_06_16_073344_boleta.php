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
        Schema::create('boletas', function (Blueprint $table) {
            $table->id('id_boleta');
            $table->string('nombre_usuario');
            $table->string('apellido_usuario');
            $table->string('nombre_chofer');
            $table->string('placa_bus');
            $table->string('ruta');
            $table->string('turno_ruta');
            $table->date('fecha_viaje');
            $table->date('hora_abordaje');
            $table->date('hora_inicio');
            $table->string('aforo_viaje');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletas');
    }
};
