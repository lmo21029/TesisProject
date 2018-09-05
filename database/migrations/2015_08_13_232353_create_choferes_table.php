<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_chofer');
            $table->string('estado');
            $table->string('cedula_chofer')->unique();
            $table->string('telefono_chofer');

            $table->integer('servicios_realizados');



            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');


            $table->integer('gruas_id')->unsigned();
            $table->foreign('gruas_id')->references('id')->on('gruas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('choferes');
    }
}
