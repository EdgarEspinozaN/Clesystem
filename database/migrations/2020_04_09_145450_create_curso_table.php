<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id("id_curso")->unique();
            $table->string("curso");
            $table->foreignId("id_nivel_cur")->references("id_nivel")->on("Niveles");
            $table->foreignId("id_aula_cur")->references("id_aula")->on("Aulas");
            $table->integer("id_docente_cur");
            $table->foreignId("id_horario_cur")->references("id_horario")->on("Horarios");
            $table->timestamps();
            $table->foreign("id_docente_cur")->references("id_docente")->on("Docentes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
