<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->integer('anio')->after('pagina_fin');
            $table->integer('numero')->after('anio');
        });
    }
    
    public function down()
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->dropColumn(['anio', 'numero']);
        });
    }    
};
