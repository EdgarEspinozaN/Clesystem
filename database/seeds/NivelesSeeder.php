<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seed para insertar los niveles
    public function run()
    {
        $hoy = Carbon::now();
        DB::table('nivels')->insert([
        	[
        		'id_nivel' => 10,
        		'nivel' => 10,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 9,
        		'nivel' => 9,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 8,
        		'nivel' => 8,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 7,
        		'nivel' => 7,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 6,
        		'nivel' => 6,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 5,
        		'nivel' => 5,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 4,
        		'nivel' => 4,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 3,
        		'nivel' => 3,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 2,
        		'nivel' => 2,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	],
        	[
        		'id_nivel' => 1,
        		'nivel' => 1,
        		'estado' => 'Activo',
                'created_at' => $hoy,
        	]
        ]);
    }
}
