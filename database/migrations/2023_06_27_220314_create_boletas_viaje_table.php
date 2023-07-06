<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasViajeTable extends Migration
{
    public function up()
    {
        Schema::create('boletas_viaje', function (Blueprint $table) {
            $table->increments('id_boleta');
            $table->unsignedInteger('id_usuario_pasajero');
            $table->unsignedInteger('id_usuario_chofer');
            $table->unsignedInteger('id_viaje');
            $table->unsignedInteger('id_reserva');
            $table->date('fecha_viaje');
            $table->time('hora_abordaje');
            $table->integer('aforo_viaje');
            $table->timestamps();

            $table->foreign('id_usuario_pasajero')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreign('id_usuario_chofer')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreign('id_viaje')->references('id_viaje')->on('viajes')->onDelete('cascade');
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade');
        });
    }

   
}