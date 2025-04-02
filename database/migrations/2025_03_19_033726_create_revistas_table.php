<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('revistas', function (Blueprint $table) {
            $table->id(); // RevistaID (Primary Key)
            $table->string('titulo')->unique();
            $table->string('ISSN')->unique();
            $table->integer('numero');
            $table->year('anio_publicacion');
            $table->timestamp('f_reg_creado')->useCurrent();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('revistas');
    }
};
