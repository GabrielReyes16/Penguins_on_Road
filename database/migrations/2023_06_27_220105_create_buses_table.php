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
            $table->string('placa', 15)->unique();
            $table->integer('aforo');
            $table->unsignedInteger('id_empresa');
            $table->timestamps();

            
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
