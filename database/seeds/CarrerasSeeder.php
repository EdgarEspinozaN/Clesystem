<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seed para insertar carreras
    public function run()
    {
        $hoy = Carbon::now();
        DB::table('carreras')->insert([
        	[
        		'id_carrera' => 5,
	        	'carrera' => 'Industrial',
	        	'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_carrera' => 4,
	        	'carrera' => 'Innovación Agrícola Sustentable',
	        	'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_carrera' => 3,
	        	'carrera' => 'Gestión Empresarial',
	        	'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_carrera' => 2,
	        	'carrera' => 'Informática',
	        	'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
	        	'id_carrera' => 1,
	        	'carrera' => 'Sistemas Computacionales',
	        	'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        ]);
    }
}
