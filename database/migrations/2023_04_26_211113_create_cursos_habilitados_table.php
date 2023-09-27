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
        Schema::create('cursos_habilitados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso');
            $table->foreign('id_curso')->references('id')->on('cursos');
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('docentes');
            $table->date('fecha_habilitacion');
            $table->date('fecha_culminacion');
            $table->integer('total_inscritos')->default(1);
            $table->string('img')->nullable();
            $table->string('dias')->nullable();
            $table->string('horario')->nullable();
            $table->integer('estado')->nullable();

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
        Schema::dropIfExists('cursos_habilitados');
    }
};
