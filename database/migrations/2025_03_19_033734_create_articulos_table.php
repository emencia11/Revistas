<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id(); // ArticuloID (Primary Key)
            $table->string('titulo')->unique();
            $table->integer('pagina_inicio');
            $table->integer('pagina_fin');
            $table->integer('anio'); // Faltante
            $table->integer('numero'); // Faltante
            $table->foreignId('revista_id')->constrained('revistas')->onDelete('cascade');
            $table->timestamp('f_reg_creado')->useCurrent();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('articulos');
    }
};
