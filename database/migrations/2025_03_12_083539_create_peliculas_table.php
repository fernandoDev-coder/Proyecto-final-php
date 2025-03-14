<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id(); // Esto crea un BIGINT UNSIGNED automáticamente
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('genero');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
