<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPagoToDetcurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('det_cursos', function (Blueprint $table) {
            //
            $table->foreignid('id_pago_det')->references('id_pago')->on('pagos');
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
            //
            $table->dropColumn(['id_pago_det']);
        });
    }
}
