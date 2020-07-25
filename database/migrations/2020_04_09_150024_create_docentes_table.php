<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->integer("id_docente")->primary()->unique();
            $table->foreignId("id_persona_D")->references("id_persona")->on("Personas");
            $table->string("cedula_prof");
            $table->string("certificacion_idioma");
            $table->foreignId("id_usuario_D")->references("id_usuario")->on("Usuarios");
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
        Schema::dropIfExists('docentes');
    }
}
