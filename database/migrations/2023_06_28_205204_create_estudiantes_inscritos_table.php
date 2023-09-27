<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes_inscritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ch');
            $table->foreign('id_ch')->references('id')->on('cursos_habilitados');
            $table->unsignedBigInteger('id_est');
            $table->foreign('id_est')->references('id')->on('estudiantes');
            $table->date('fecha_inscripcion');
            $table->float('monto_pagado')->default(0);
            $table->string('comprobante')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes_inscritos');
    }
};
