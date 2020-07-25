<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seed para insertar roles
    public function run()
    {
        $hoy = Carbon::now();
        DB::table('rols')->insert([
        	[
        		'id_rol' => 3,
        		'rol' => 'Alumno',
                'created_at' => $hoy,
        	],
        	[
        		'id_rol' => 2,
        		'rol' => 'Docente',
                'created_at' => $hoy,
        	],
        	[ 
        		'id_rol' => 1,
        		'rol' => 'Admin',
                'created_at' => $hoy,
        	],
        ]);
    }
}
