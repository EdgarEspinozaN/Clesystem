<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->integer("id_alumno")->primary()->unique();
            $table->foreignId("id_persona_A")->references("id_persona")->on("Personas");
            $table->foreignId("id_carrera_A")->references("id_carrera")->on("Carreras");
            $table->integer("semestre");
            $table->string("turno");
            $table->foreignId("id_usuario_A")->references("id_usuario")->on("Usuarios");
            $table->integer("nivel_aprobado");
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
        Schema::dropIfExists('alumnos');
    }
}
