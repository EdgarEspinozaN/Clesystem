<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnasADetcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('det_cursos', function (Blueprint $table) {
            $table->dropColumn(['estado', 'ciclo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('det_cursos', function (Blueprint $table) {
            $table->string("estado");
            $table->string("ciclo");
        });
    }
}
