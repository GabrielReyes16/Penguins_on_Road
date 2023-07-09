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
            $table->unsignedInteger('id_chofer');
            $table->date('fecha_viaje');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('estado', 20)->default('Activo');
            $table->integer('aforo_actual')->default(0);
            $table->timestamps();
        
            $table->foreign('id_ruta')->references('id_ruta')->on('rutas')->onDelete('cascade');
            $table->foreign('id_bus')->references('id_bus')->on('buses')->onDelete('cascade');
            $table->foreign('id_chofer')->references('id_chofer')->on('choferes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
