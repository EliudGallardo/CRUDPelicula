<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("catalogo", function (Blueprint $table) {
            $table->id();
            $table->string("titulo",250);
            $table->string("descripcion",250);
            $table->string("genero",250);
            $table->string("director",250);
            $table->date("fecha_estreno");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
