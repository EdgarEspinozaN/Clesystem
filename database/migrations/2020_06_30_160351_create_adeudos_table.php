<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdeudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adeudos', function (Blueprint $table) {
            $table->id();
            $table->integer("folio");
            $table->integer("alumno_id");
            $table->string("cantidad");
            $table->timestamps();
            $table->foreign('alumno_id')->references('id_alumno')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adeudos');
    }
}
