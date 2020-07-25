<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // seed para insertar usuarios administradores
    public function run()
    {
        $hoy = Carbon::now();
        DB::table('personas')->insert([
        	[
        		'id_persona' => 1,
        		'nombre' => 'User',
        		'ape_pat' => 'Root',
        		'ape_mat' => 'root',
        		'telefono' => 1234567890,
        		'correo' => 'root@admin.com',
                'created_at' => $hoy,
        	],
        	[
	        	'id_persona' => 2,
	            'nombre' => 'CLE',
	            'ape_pat' => 'Admin',
	            'ape_mat' => 'User',
	            'telefono' => 1234567890,
	            'correo' => 'Admin@admin.com',
                'created_at' => $hoy,
        	]
        	
        ]);

        DB::table('usuarios')->insert([
        	[
	        	'id_usuario' => 1,
	        	'username' => 'AdminMaster',
	        	'password' => bcrypt('ClesystemAdminRoot.Pass.1'),
	        	'id_rol_U' => 1,
                'created_at' => $hoy,
	        ],
        	[
	        	'id_usuario' => 2,
	        	'username' => 'AdminCLE',
	        	'password' => bcrypt('AdminCLEPass1.'),
	        	'id_rol_U' => 1,
                'created_at' => $hoy,
	        ]
	        
        ]);

        DB::table('admins')->insert([
        	[
        		'id' => 1,
        		'id_persona_admin' => 1,
        		'id_usuario_admin' => 1,
                'created_at' => $hoy,
        	],
        	[
        		'id' => 2,
        		'id_persona_admin' => 2,
        		'id_usuario_admin' => 2,
                'created_at' => $hoy,
        	]
        	
        ]);
    }
}
