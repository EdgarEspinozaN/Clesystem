<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id("id_calificacion")->unique();
            $table->integer("id_alumno_C");
            $table->integer("cal_1");
            $table->integer("cal_2");
            $table->integer("recuperacion");
            $table->foreign("id_alumno_C")->references("id_alumno")->on("alumnos");
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
        Schema::dropIfExists('calificacions');
    }
}
