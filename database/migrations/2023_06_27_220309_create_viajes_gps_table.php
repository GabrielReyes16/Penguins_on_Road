<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesGpsTable extends Migration
{
    public function up()
    {
        Schema::create('viajes_gps', function (Blueprint $table) {
            $table->increments('id_GPS');
            $table->unsignedInteger('id_viaje');
            $table->string('posicion_x', 50);
            $table->string('posicion_y', 50);
            $table->time('hora_posicion');
            $table->timestamps();

            $table->foreign('id_viaje')->references('id_viaje')->on('viajes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes_gps');
    }
}
