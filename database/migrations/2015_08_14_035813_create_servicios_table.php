<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('origen');
            $table->string('reforigen');
            $table->string('destino');
            $table->string('refdestino');
            $table->string('monto');
            $table->string('placa');
            $table->string('tipo_servicio');
            $table->string('kilometros');
            $table->string('tipo_cliente');
            $table->boolean('servicios_pagados');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('chofer_id')->unsigned();
            $table->foreign('chofer_id')->references('id')->on('choferes');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicios');
    }
}
