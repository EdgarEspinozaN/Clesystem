<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDeleteMethodTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('docentes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('personas', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('det_cursos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('calificacions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('pagos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('adeudos', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('aulas', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('carreras', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('horarios', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('nivels', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('personas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('det_cursos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('calificacions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('adeudos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('aulas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('nivels', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
