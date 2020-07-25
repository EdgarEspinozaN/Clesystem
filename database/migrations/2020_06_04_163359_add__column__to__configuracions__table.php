<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->dropColumn(['examen1', 'examen2', 'examen3']);

            $table->date('examen1_inicio')->after('cupos');
            $table->date('examen1_fin')->after('examen1_inicio');
            $table->date('examen2_inicio')->after('examen1_fin');
            $table->date('examen2_fin')->after('examen2_inicio');
            $table->date('examen3_inicio')->after('examen2_fin');
            $table->date('examen3_fin')->after('examen3_inicio');
        });
    }

    /**     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuracions', function (Blueprint $table) {
            $table->dropColumn(['examen1_inicio', 'examen1_fin', 'examen2_inicio', 'examen2_fin', 'examen3_inicio', 'examen3_fin']);
            $table->date('examen1')->after('cupos');
            $table->date('examen2')->after('examen1');
            $table->date('examen3')->after('examen2');
        });
    }
}
