<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParaderosTable extends Migration
{
    public function up()
    {
        Schema::create('paraderos', function (Blueprint $table) {
            $table->increments('id_paradero');
            $table->unsignedInteger('id_ruta');
            $table->string('nombre', 100);
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->timestamps();
        
            $table->foreign('id_ruta')->references('id_ruta')->on('rutas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('paraderos');
    }
}
