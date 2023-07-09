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
            $table->unsignedInteger('id_bus')->nullable();
            $table->unsignedInteger('id_empresa');
            $table->string('licencia_conducir', 20)->unique();
            $table->string('estado')->default('Activo');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreign('id_bus')->references('id_bus')->on('buses')->onDelete('cascade');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('choferes');
    }
}
