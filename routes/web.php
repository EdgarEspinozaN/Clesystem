<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

// como funcionan las rutas 
// 1. se define la ruta con Route::
// 2. se define el metodo con el cual se accedera a la url (get, post, delete, patch)
// 3. entre los paraentesis con comillas se define la url 
// 4. se define una funcion o se hace referencia a contrador seguido de un @ con el nombre de la funcion a ejecutar
// 5. opcionalmente se puede asignar un nombre a la url para diferentes propositos

// |--1--|-2-| |------3---------|  |--------------4----------------|   |------5------------| 	
// Route::get('/general/niveles', 'General\nivelesController@index')->name('niveles.index');

//rutas para la autenticación
Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);

// rutas para el login
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'auth\LoginController@showLoginForm');
Route::get('/forgot/password', 'auth\ForgotPasswordController@index')->name('forgot.password');
Route::post('/forgot/password', 'auth\ForgotPasswordController@mail')->name('forgot.password');
Route::get('/forgot/password/send', 'auth\ForgotPasswordController@send')->name('send.password');
Route::get('/reset/password/{email}/{token}', 'auth\ResetPasswordController@index');
Route::post('/reset/password/update', 'auth\ResetPasswordController@update')->name('update.password');

// rutas de admin para reestablecer la contraseñas
Route::post("/password/alumno", 'PasswordController@RestablecerAlumno');
Route::post('/password/docente', 'PasswordController@RestablecerDocente');
Route::post('/password/admin', 'PasswordController@RestablecerAdmin');

//rutas para la configuracion del usuario admin
Route::resource('/admin','adminController', ['except' => ['create', 'store', 'show', 'destroy']]);

// rutas de admin para funciones de alumnos
// (En curso)
Route::resource('/alumnos', 'AlumnosController', ['except' => ['edit', 'create']]);
Route::get('/alumnos/curso/{alumno}', 'AlumnosController@alumno_curso')->name('alumnos.curso');
Route::get('/alumnos/eliminar/multiple', 'AlumnosController@DeleteMultiple')->name('alumnos.multDel');
Route::post('/alumnos/eliminar/multiple', 'AlumnosController@DeleteMultipleAlumnos')->name('alumnos.multDelAlum');
// (General) 
Route::get('/general/alumnos', 'General\AlumnoController@index')->name('AlumnosGeneral.index');
Route::post('/general/alumnos/{id}', 'General\AlumnoController@alta');
Route::get('/general/alumnos/cal/{id}', 'General\AlumnoController@lista')->name('AlumnosGeneral.lista');
Route::get('/general/alumnos/deshabilitar', 'General\AlumnoController@deshabilitarMult')->name('GenAlumnos.multDel');
// Route::delete('/general/alumnos/delete/{id}', 'General\AlumnoController@delete');

// rutas de admin para funciones de docentes
// (En curso)
Route::resource('/docentes', 'DocentesController', ['except' => ['create', 'show', 'edit']]);
Route::get('/docentes/lista/{id}', 'DocentesController@lista')->name('docentes.lista');
Route::get('/docentes/eliminar/multiple', 'DocentesController@DeleteMultiple')->name('docentes.deletevista');
Route::post('/docentes/eliminar/multiple', 'DocentesController@DeleteMultipleDocentes')->name('docentes.deleteMult');
// (General)
Route::get('/general/docentes', 'General\DocenteController@index')->name('DocentesGeneral.index');
Route::post('/general/docentes/{id}', 'General\DocenteController@alta');
Route::get('/general/docentes/lista/{id}', 'General\DocenteController@lista')->name('DocentesGeneral.lista');
Route::get('/general/docentes/deshabilitar', 'General\DocenteController@deshabilitarMult')->name('GenDocentes.multDel');
// Route::delete('/general/docentes/delete/{id}', 'General\DocenteController@delete');

//rutas de admin para funciones de aula
// (En curso)
// Route::resource('/aulas', 'AulasController', ['except' => ['create', 'show', 'edit']]);
// (General)
Route::resource('/general/aulas', 'General\aulasController', ['except' => ['create', 'show', 'edit']]);
// Route::get('/general/aulas', 'General\aulasController@index')->name('AulasGeneral.index');
Route::post('/general/aulas/{id}', 'General\aulasController@alta');
Route::get('/general/aulas/eliminar/multiple', 'General\aulasController@deleteVista')->name('aulas.deletevista');
Route::post('/general/aulas/eliminar/multiple', 'General\aulasController@deleteMult')->name('aulas.deleteMult');

// rutas de admin para funciones de horarios
// (En curso)
// Route::resource('/horarios', 'HorariosController', ['except' => ['create', 'show', 'edit']]);
// (General)
Route::resource('/general/horarios', 'General\HorarioController', ['except' => ['create', 'show', 'edit']]);
// Route::get('/general/horarios', 'General\horarioController@index')->name('HorariosGeneral.index');
Route::post('general/horarios/{id}', 'General\horarioController@alta');
Route::get('general/horarios/eliminar/multiple', 'General\HorarioController@deleteVista')->name('horarios.deletevista');
Route::post('general/horarios/eliminar/multiple', 'General\HorarioController@deleteMult')->name('horarios.deleteMult');

// rutas de admin para funciones de cursos
// (En curso)
Route::resource('/cursos', 'CursosController', ['except' => ['create']]);
Route::get('/cursos/ciclo/terminar', 'CursosController@terminar');
Route::get('/cursos/cambio/{alumno}/{curso}', 'CursosController@cambio')->name('curso.cambio');
Route::post('/cursos/cambio', 'CursosController@realizarCambio');
Route::post('/cursos/addAlumnos', 'detCursoController@addAlumnos');
Route::post('/cursos/pdf/boletas', 'PdfController@GeneratePdfTerminar')->name('terminar.cursoPdf');

// (General)
Route::get('/general/cursos', 'General\cursosController@index')->name('CursosGeneral.index');
Route::get('/general/cursos/{id}', 'General\cursosController@lista')->name('CursosGeneral.lista');
// Route::delete('/general/cursos/delete/{id}', 'General\cursosController@delete');

// rutas de admin para las funciones de calificaciones
Route::resource('/calificaciones', 'detCursoController', ['except' => ['create', 'show', 'edit']]);

// rutas de admin para las funciones de pagos
// (En curso)
Route::resource('/pagos', 'pagoController', ['except' => ['create', 'show', 'update', 'destroy']]);
Route::get('/pagos/adeudos', 'pagoController@adeudos')->name('pagos.adeudos');
Route::post('/pagos/adeudos/pagar', 'pagoController@pagar');
// (General)
Route::get('/general/pagos', 'General\pagosController@index')->name('PagosGeneral.index');
Route::post('/general/pagos/{id}', 'pagoController@edit')->name('PagosGeneral.edit');

// rutas de admin para las funciones de niveles
Route::get('/general/niveles', 'General\nivelesController@index')->name('niveles.index');
Route::post('/general/niveles', 'General\nivelesController@store');
Route::delete('/general/niveles/{id}', 'General\nivelesController@destroy');
Route::post('/general/niveles/alta/{id}', 'General\nivelesController@alta');
Route::get('/general/niveles/eliminar/multiple', 'General\nivelesController@deletevista')->name('niveles.deletevista');
Route::delete('/general/niveles/eliminar/multiple', 'General\nivelesController@deleteMult')->name('niveles.deleteMult');

// rutas de admin para las funciones de carreras
Route::get('/general/carreras', 'General\carrerasController@index')->name('carreras.index');
Route::post('/general/carreras', 'General\carrerasController@store');
Route::patch('/general/carreras/{id}', 'General\carrerasController@update');
Route::delete('/general/carreras/{id}', 'General\carrerasController@destroy');
Route::post('/general/carreras/alta/{id}', 'General\carrerasController@alta');

// rutas de admin para las funciones de configuracion de los cursos
Route::get('/config', 'ConfiguracionController@index')->name('config.index');
Route::post('/config', 'ConfiguracionController@store');

//rutas para la administracion de docentes
Route::get('/docente/home', 'ModuloDocente\DocenteController@home')->name('docente.home');
Route::get('/docente/cursos','ModuloDocente\DocenteController@index')->name('docente.cursos');
Route::get('/docente/curso/{id}', 'ModuloDocente\DocenteController@lista')->name('docente.curso.lista');
Route::patch('/docente/calificaciones/{id}', 'ModuloDocente\DocenteController@updateCal');
Route::get('/docente/perfil', 'ModuloDocente\DocenteController@edit')->name('docente.profile');
Route::patch('/docente/perfil', 'ModuloDocente\DocenteController@update')->name('docente.update.profile');
Route::patch('/docente/password', 'ModuloDocente\DocenteController@password')->name('docente.update.pass');

//rutas de generación de PDF.
Route::get('/generate/pdf/{alumnos}/{curso}', 'PdfController@GeneratePdf');
Route::get('/generate/mult/pdf/{curso}', 'PdfController@GenerateMultiplePdf');

// rutas para la eliminacion de registros
Route::get('/eliminar/registros', 'deleteController@eliminarRegistros')->name('eliminar.registros');
Route::post('/eliminar/registros', 'deleteController@softDelete')->name('soft.Delete');

Route::get('/hard/delete', 'deleteController@hardDelete');

Route::resource('/alumno/home', 'ModuloAlumno\AlumnoController');

//rutas del modulo de alumnos
// Route::get('/alumno/home', 'ModuloAlumno\AlumnoController@index');
Route::resource('/alumno/calificacion', 'ModuloAlumno\calificacionController');
Route::resource('/alumno/horario', 'ModuloAlumno\horarioController');
Route::resource('/alumno/calificaciongeneral', 'ModuloAlumno\calificaciongeneralController');
Route::resource('/alumno/datospersonales', 'ModuloAlumno\datospersonalesController@index');
Route::get('/alumno/datospersonales', 'ModuloAlumno\datospersonalesController@edit')->name('alumno.profile');
Route::patch('/alumno/datospersonales', 'ModuloAlumno\datospersonalesController@update')->name('alumno.update.profile');
Route::patch('/alumno/password', 'ModuloAlumno\datospersonalesController@password')->name('alumno.update.pass');