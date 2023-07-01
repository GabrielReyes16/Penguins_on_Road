<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id_viaje');
            $table->unsignedInteger('id_ruta');
            $table->unsignedInteger('id_bus');
            $table->date('fecha_viaje');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('estado', 20);
            $table->integer('aforo_actual')->default(0);
            $table->timestamps();

            $table->foreign('id_ruta')->references('id_ruta')->on('rutas')->onDelete('cascade');
            $table->foreign('id_bus')->references('id_bus')->on('buses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
