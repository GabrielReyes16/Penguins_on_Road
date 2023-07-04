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
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_viaje');
            $table->string('codigoDeAcceso',10)->unique();
            $table->text('codigo_qr');  
            $table->boolean('utilizada')->default(false);
            $table->timestamps();
        
            $table->foreign('id_usuario')->references('id_usuario')->on('users');
            $table->foreign('id_viaje')->references('id_viaje')->on('viajes');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
