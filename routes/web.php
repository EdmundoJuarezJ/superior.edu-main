<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CmodalidadController;
use App\Http\Controllers\CcarreraController;
use App\Http\Controllers\CplanestudioController;
use App\Http\Controllers\CescalaevalController;
use App\Http\Controllers\CentidadController;
use App\Http\Controllers\ClocalidadController;
use App\Http\Controllers\CmovimientoController;
use App\Http\Controllers\CasignaturaController;
use App\Http\Controllers\CmunicipioController;
use App\Http\Controllers\CmotivobajaController;
use App\Http\Controllers\CperiodoController;
use App\Http\Controllers\CpersonaController;
use App\Http\Controllers\CalumnomovimientoController;
use App\Http\Controllers\CgrupoController;
use App\Http\Controllers\CevaluacionController;
use App\Http\Controllers\ReportController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [LoginController::class, 'showLoginForm']);

// Auth::routes();
Auth::routes([
		'register' => false,
		'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/plantilla', [App\Http\Controllers\TemplateController::class, 'index'])->name('plantilla');
/*Para:
  Modalidades
*/
Route::get('modalidades', [CmodalidadController::class, 'index']);

Route::resource('modalidades', CmodalidadController::class);

Route::post('get-cmodalidadesdata', [CmodalidadController::class, 'fetchCmodalidadData']);


Route::get('add-cmodalidad', [CmodalidadController::class, 'create']);


Route::post('save-cmodalidad', [CmodalidadController::class, 'store']);


Route::get('edit-cmodalidad/{id}/edit', [CmodalidadController::class, 'edit']);


Route::get('fetch-cmodalidad-showbyid/{id}', [CmodalidadController::class, 'editdata']);

Route::put('update-cmodalidad/{id}', [CmodalidadController::class, 'update']);


Route::get('show-cmodalidad/{id}', [CmodalidadController::class, 'showpage']);

Route::delete('delete-cmodalidad/{id}', [CmodalidadController::class, 'delete']);
/*Para: 
	Carreras
*/
Route::get('carreras', [CcarreraController::Class, 'index']);

Route::post('get-ccarrerasdata', [CcarreraController::class, 'fetchCcarreraData']);

Route::get('add-ccarrera', [CcarreraController::class, 'create']); 

Route::post('save-ccarrera', [CcarreraController::class, 'store']);

Route::get('edit-ccarrera/{id}/edit', [CcarreraController::class, 'edit']);

Route::get('fetch-ccarrera-showbyid/{id}', [CcarreraController::class, 'editdata']);

Route::put('update-ccarrera/{id}', [CcarreraController::class, 'update']);

Route::get('show-ccarrera/{id}', [CcarreraController::class, 'showpage']);

Route::delete('delete-ccarrera/{id}', [CcarreraController::class, 'delete']);

Route::resource('carreras', CcarreraController::class);

/*Para: 
	Planestudios
*/
Route::get('planestudios', [CplanestudioController::class, 'index']);

Route::post('get-cplanestudiosdata', [CplanestudioController::class, 'fetchCplanestudioData']);

Route::get('add-cplanestudio', [CplanestudioController::class, 'create']);

Route::post('save-cplanestudio', [CplanestudioController::class, 'store']);

Route::get('edit-cplanestudio/{id}/edit', [CplanestudioController::class, 'edit']);

Route::get('fetch-cplanestudio-showbyid/{id}', [CplanestudioController::class, 'editdata']);

Route::put('update-cplanestudio/{id}', [CplanestudioController::class, 'update']);

Route::get('show-cplanestudio/{id}', [CplanestudioController::class, 'showpage']);

Route::delete('delete-cplanestudio/{id}', [CplanestudioController::class, 'delete']);

Route::resource('planestudios', CplanestudioController::class);

/*Para: 
	Escalaeval
*/
Route::get('escalaevals', [CescalaevalController::class, 'index']);

Route::resource('escalaevals', CescalaevalController::class);

Route::post('get-cescalaevalsdata', [CescalaevalController::class, 'fetchCescalaevalData']);


Route::get('add-cescalaeval', [CescalaevalController::class, 'create']);


Route::post('save-cescalaeval', [CescalaevalController::class, 'store']);


Route::get('edit-cescalaeval/{id}/edit', [CescalaevalController::class, 'edit']);


Route::get('fetch-cescalaeval-showbyid/{id}', [CescalaevalController::class, 'editdata']);

Route::put('update-cescalaeval/{id}', [CescalaevalController::class, 'update']);


Route::get('show-cescalaeval/{id}', [CescalaevalController::class, 'showpage']);

Route::delete('delete-cescalaeval/{id}', [CescalaevalController::class, 'delete']);
/*Para: 
	Entidad
*/
Route::get('entidades', [CentidadController::class, 'index']);

Route::resource('entidades', CentidadController::class);


Route::post('get-centidadesdata', [CentidadController::class, 'fetchCentidadData']);


Route::get('add-centidad', [CentidadController::class, 'create']);


Route::post('save-centidad', [CentidadController::class, 'store']);


Route::get('edit-centidad/{id}/edit', [CentidadController::class, 'edit']);


Route::get('fetch-centidad-showbyid/{id}', [CentidadController::class, 'editdata']);

Route::put('update-centidad/{id}', [CentidadController::class, 'update']);


Route::get('show-centidad/{id}', [CentidadController::class, 'showpage']);

Route::delete('delete-centidad/{id}', [CentidadController::class, 'delete']);
/*Para: 
	Localidad
*/
Route::get('localidades', [ClocalidadController::class, 'index']);

Route::resource('localidades', ClocalidadController::class);


Route::post('get-clocalidadesdata', [ClocalidadController::class, 'fetchClocalidadData']);


Route::get('add-clocalidad', [ClocalidadController::class, 'create']);


Route::post('save-clocalidad', [ClocalidadController::class, 'store']);


Route::get('edit-clocalidad/{id}/edit', [ClocalidadController::class, 'edit']);


Route::get('fetch-clocalidad-showbyid/{id}', [ClocalidadController::class, 'editdata']);

Route::put('update-clocalidad/{id}', [ClocalidadController::class, 'update']);


Route::get('show-clocalidad/{id}', [ClocalidadController::class, 'showpage']);

Route::delete('delete-clocalidad/{id}', [ClocalidadController::class, 'delete']);
/*Para: 
	Movimientos
*/
Route::get('movimientos', [CmovimientoController::Class, 'index']);

Route::post('get-cmovimientosdata', [CmovimientoController::class, 'fetchCmovimientoData']);

Route::get('add-cmovimiento', [CmovimientoController::class, 'create']); 

Route::post('save-cmovimiento', [CmovimientoController::class, 'store']);

Route::get('edit-cmovimiento/{id}/edit', [CmovimientoController::class, 'edit']);

Route::get('fetch-cmovimiento-showbyid/{id}', [CmovimientoController::class, 'editdata']);

Route::put('update-cmovimiento/{id}', [CmovimientoController::class, 'update']);

Route::get('show-cmovimiento/{id}', [CmovimientoController::class, 'showpage']);

Route::delete('delete-cmovimiento/{id}', [CmovimientoController::class, 'delete']);

Route::resource('movimientos', CmovimientoController::class);

//RUTAS PARA ASIGNATURA
Route::get('asignaturas', [CasignaturaController::class, 'index']);

Route::resource('asignaturas', CasignaturaController::class);
Route::post('get-casignaturasdata', [CasignaturaController::class, 'fetchCasignaturaData']);
Route::get('add-casignatura', [CasignaturaController::class, 'create']);
Route::post('save-casignatura', [CasignaturaController::class, 'store']);
Route::get('edit-casignatura/{id}/edit', [CasignaturaController::class, 'edit']);
Route::get('fetch-casignatura-showbyid/{id}', [CasignaturaController::class, 'editdata']);
Route::put('update-casignatura/{id}', [CasignaturaController::class, 'update']);
Route::get('show-casignatura/{id}', [CasignaturaController::class, 'showpage']);
Route::delete('delete-casignatura/{id}', [CasignaturaController::class, 'delete']);

//RUTAS PARA MUNICIPIO
Route::get('municipios', [CmunicipioController::class, 'index']);

Route::resource('municipios', CmunicipioController::class);
Route::post('get-cmunicipiosdata', [CmunicipioController::class, 'fetchCmunicipioData']);
Route::get('add-cmunicipio', [CmunicipioController::class, 'create']);
Route::post('save-cmunicipio', [CmunicipioController::class, 'store']);
Route::get('edit-cmunicipio/{id}/edit', [CmunicipioController::class, 'edit']);
Route::get('fetch-cmunicipio-showbyid/{id}', [CmunicipioController::class, 'editdata']);
Route::put('update-cmunicipio/{id}', [CmunicipioController::class, 'update']);
Route::get('show-cmunicipio/{id}', [CmunicipioController::class, 'showpage']);
Route::delete('delete-cmunicipio/{id}', [CmunicipioController::class, 'delete']);

//RUTAS PARA MOTIVO BAJA
Route::get('motivobajas', [CmotivobajaController::class, 'index']);

Route::resource('motivobajas', CmotivobajaController::class);
Route::post('get-cmotivobajasdata', [CmotivobajaController::class, 'fetchCmotivobajaData']);
Route::get('add-cmotivobaja', [CmotivobajaController::class, 'create']);
Route::post('save-cmotivobaja', [CmotivobajaController::class, 'store']);
Route::get('edit-cmotivobaja/{id}/edit', [CmotivobajaController::class, 'edit']);
Route::get('fetch-cmotivobaja-showbyid/{id}', [CmotivobajaController::class, 'editdata']);
Route::put('update-cmotivobaja/{id}', [CmotivobajaController::class, 'update']);
Route::get('show-cmotivobaja/{id}', [CmotivobajaController::class, 'showpage']);
Route::delete('delete-cmotivobaja/{id}', [CmotivobajaController::class, 'delete']);

//RUTAS PARA PERIODO
Route::get('periodos', [CperiodoController::class, 'index']);

Route::resource('periodos', CperiodoController::class);
Route::post('get-cperiodosdata', [CperiodoController::class, 'fetchCperiodoData']);
Route::get('add-cperiodo', [CperiodoController::class, 'create']);
Route::post('save-cperiodo', [CperiodoController::class, 'store']);
Route::get('edit-cperiodo/{id}/edit', [CperiodoController::class, 'edit']);
Route::get('fetch-cperiodo-showbyid/{id}', [CperiodoController::class, 'editdata']);
Route::put('update-cperiodo/{id}', [CperiodoController::class, 'update']);
Route::get('show-cperiodo/{id}', [CperiodoController::class, 'showpage']);
Route::delete('delete-cperiodo/{id}', [CperiodoController::class, 'delete']);

//RUTAS PARA PERSONA
Route::get('personas', [CpersonaController::class, 'index']);

Route::resource('personas', CpersonaController::class);
Route::post('get-cpersonasdata', [CpersonaController::class, 'fetchCpersonaData']);
Route::get('add-cpersona', [CpersonaController::class, 'create']);
Route::post('save-cpersona', [CpersonaController::class, 'store']);
Route::get('edit-cpersona/{id}/edit', [CpersonaController::class, 'edit']);
Route::get('fetch-cpersona-showbyid/{id}', [CpersonaController::class, 'editdata']);
Route::put('update-cpersona/{id}', [CpersonaController::class, 'update']);
Route::get('show-cpersona/{id}', [CpersonaController::class, 'showpage']);
Route::delete('delete-cpersona/{id}', [CpersonaController::class, 'delete']);

//RETAS PARA ALUMNO MOVIMIENTO
Route::get('alumnomovimientos', [CalumnomovimientoController::class, 'index']);

Route::resource('alumnomovimientos', CalumnomovimientoController::class);
Route::post('get-calumnomovimientosdata', [CalumnomovimientoController::class, 'fetchCalumnomovimientoData']);
Route::get('add-calumnomovimiento', [CalumnomovimientoController::class, 'create']);
Route::post('save-calumnomovimiento', [CalumnomovimientoController::class, 'store']);
Route::get('edit-calumnomovimiento/{id}/edit', [CalumnomovimientoController::class, 'edit']);
Route::get('fetch-calumnomovimiento-showbyid/{id}', [CalumnomovimientoController::class, 'editdata']);
Route::put('update-calumnomovimiento/{id}', [CalumnomovimientoController::class, 'update']);
Route::get('show-calumnomovimiento/{id}', [CalumnomovimientoController::class, 'showpage']);
Route::delete('delete-calumnomovimiento/{id}', [CalumnomovimientoController::class, 'delete']);

//RUTAS PARA GRUPO
Route::get('grupos', [CgrupoController::class, 'index']);

Route::resource('grupos', CgrupoController::class);
Route::post('get-cgruposdata', [CgrupoController::class, 'fetchCgrupoData']);
Route::get('add-cgrupo', [CgrupoController::class, 'create']);
Route::post('save-cgrupo', [CgrupoController::class, 'store']);
Route::get('edit-cgrupo/{id}/edit', [CgrupoController::class, 'edit']);
Route::get('fetch-cgrupo-showbyid/{id}', [CgrupoController::class, 'editdata']);
Route::put('update-cgrupo/{id}', [CgrupoController::class, 'update']);
Route::get('show-cgrupo/{id}', [CgrupoController::class, 'showpage']);
Route::delete('delete-cgrupo/{id}', [CgrupoController::class, 'delete']);
/*Para: 
	Evaluaciones
*/
Route::get('evaluaciones', [CevaluacionController::Class, 'index']);

Route::post('get-cevaluacionesdata', [CevaluacionController::class, 'fetchCevaluacionData']);

Route::get('add-cevaluacion', [CevaluacionController::class, 'create']); 

Route::post('save-cevaluacion', [CevaluacionController::class, 'store']);

Route::get('edit-cevaluacion/{id}/edit', [CevaluacionController::class, 'edit']);

Route::get('fetch-cevaluacion-showbyid/{id}', [CevaluacionController::class, 'editdata']);

Route::put('update-cevaluacion/{id}', [CevaluacionController::class, 'update']);

Route::get('show-cevaluacion/{id}', [CevaluacionController::class, 'showpage']);

Route::delete('delete-cevaluacion/{id}', [CevaluacionController::class, 'delete']);

Route::resource('evaluaciones', CevaluacionController::class);
//AUTH ENRUTAMIENTO
Auth::routes();