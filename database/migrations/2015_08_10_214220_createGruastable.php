<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruastable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gruas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_grua');
            $table->string('marca_grua');
            $table->string('estado');
            $table->string('placa_grua')->unique();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gruas');
    }
}
