<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_municipio', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement(); // también hace el campo Primary Key
            $table->string('nombre', 255);
            $table->timestamps();

            $table->unsignedTinyInteger('identidad');
            $table->foreign('identidad')->references('id')->on('c_entidad');

            // $table->id();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_municipio');
    }
}
