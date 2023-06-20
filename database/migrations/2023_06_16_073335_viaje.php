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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id('id_viaje');
            $table->string('ruta');
            $table->string('bus');
            $table->string('posicion');
            $table->date('fecha_viaje');
            $table->date('hora_inicio');
            $table->date('hora_final');
            $table->string('estado');
            $table->string('aforo');
            $table->string('chofer');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
