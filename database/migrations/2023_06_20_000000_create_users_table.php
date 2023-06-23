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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('biografia', 350);
            $table->string('especialidad', 50);
            $table->string('rol');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('licencia_conducir')->nullable();
            $table->string('id_empresa')->nullable();
            $table->binary('foto_perfil')->default('');
            $table->binary('foto_banner')->default('');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
