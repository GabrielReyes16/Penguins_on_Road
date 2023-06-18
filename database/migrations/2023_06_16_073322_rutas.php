<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id('id_ruta') ->unique();
            $table->string('id_paraderos');
            $table->string('nombre');
            $table->string('turno');
            $table->string('punto_inicio');
            $table->string('punto_fin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
