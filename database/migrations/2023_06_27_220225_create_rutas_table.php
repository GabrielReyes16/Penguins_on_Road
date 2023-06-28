<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->increments('id_ruta');
            $table->unsignedInteger('id_turno');
            $table->string('punto_inicial', 100);
            $table->string('punto_final', 100);
            $table->timestamps();

            $table->foreign('id_turno')->references('id_turno')->on('turnos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
