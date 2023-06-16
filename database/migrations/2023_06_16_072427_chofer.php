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
       Schema::create('chofer',function(Blueprint $table){
            $table -> id();
            $table -> string('');
            /**Por hacer o modificar */
            // $table -> id();
            // $table -> id();
            // $table -> id();
            // $table -> id();
            // $table -> id();


       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chofer');
    }
};
