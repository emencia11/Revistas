<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('autores', function (Blueprint $table) {
            $table->id(); // AutorID (Primary Key)
            $table->string('nombre');
            $table->string('correo_electronico')->unique();
            $table->string('adscripcion')->nullable();
            $table->timestamp('f_reg_creado')->useCurrent();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('autores');
    }
};
