<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferesTable extends Migration
{
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id_chofer');
            $table->unsignedInteger('id_usuario');
            $table->string('licencia_conducir', 20);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('choferes');
    }
}
