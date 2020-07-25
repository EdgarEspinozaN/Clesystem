<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigSeeder extends Seeder
{
    public function __construct(){
        
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seed para insertar las configuraciones por defecto
    public function run()
    {
        $hoy = Carbon::now();
        DB::table('configuracions')->insert([
        		'id' => 1,
        		'coste' => 1400,
        		'cupos' => 30,
        		'examen1_inicio' => '2020-05-18',
                'examen1_fin' => '2020-05-22',
        		'examen2_inicio' => '2020-05-25',
                'examen2_fin' => '2020-05-29',
        		'examen3_inicio' => '2020-06-01',
                'examen3_fin' => '2020-06-06',
                'created_at' => $hoy,
        ]);
    }
}
