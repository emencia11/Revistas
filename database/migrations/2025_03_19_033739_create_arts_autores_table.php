<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('arts_autores', function (Blueprint $table) {
            $table->id(); // ArtsAutoresID (Primary Key)
            $table->foreignId('articulo_id')->constrained('articulos')->onDelete('cascade');
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade');
            $table->integer('posicion');
            $table->timestamp('f_reg_creado')->useCurrent();
            $table->timestamps();

            // Restricciones únicas
            $table->unique(['articulo_id', 'autor_id']); // Un autor no puede repetirse en un artículo
            $table->unique(['articulo_id', 'posicion']); // No pueden haber dos autores en la misma posición dentro del mismo artículo
        });
    }

    public function down() {
        Schema::dropIfExists('arts_autores');
    }
};
