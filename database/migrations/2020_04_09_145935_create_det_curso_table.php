<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_cursos', function (Blueprint $table) {
            $table->id("id_det_curso")->unique();
            $table->foreignId("id_curso_det")->references("id_curso")->on("Cursos");
            $table->integer("id_alumno_det");
            $table->foreignId("id_calificacion_det")->references("id_calificacion")->on("Calificaciones");
            $table->string("estado");
            $table->string("ciclo");
            $table->timestamps();
            $table->foreign("id_alumno_det")->references("id_alumno")->on("Alumnos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_cursos');
    }
}
