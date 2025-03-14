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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelicula_id'); // Clave foránea correcta
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            // Definir la clave foránea correctamente
            $table->foreign('pelicula_id')
                ->references('id')
                ->on('peliculas')
                ->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
