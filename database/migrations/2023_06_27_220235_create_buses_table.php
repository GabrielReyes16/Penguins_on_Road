<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->increments('id_bus');
            $table->string('placa', 15);
            $table->integer('aforo');
            $table->unsignedInteger('id_empresa');
            $table->unsignedInteger('id_chofer');
            $table->timestamps();

            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('cascade');
            $table->foreign('id_chofer')->references('id_chofer')->on('choferes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
