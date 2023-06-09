<?php

use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\EntregadeactividadeController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homecontenido', [App\Http\Controllers\HomecontenidoController::class, 'index'])->name('homecontenido');
Route::get('/homeactividade', [App\Http\Controllers\HomeactividadeController::class, 'index'])->name('homeactividade');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('contenidos', ContenidoController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('actividades', ActividadeController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('examenes', ExamenController::class)->parameters(['examenes' => 'examen'])
        ->missing(fn(Request $request) => Redirect::route('examenes.index'));
    Route::prefix('examenes/{examen}')->group(function() {
        Route::resource('preguntas', PreguntaController::class)->only(['index', 'create', 'store'])->parameters(['preguntas' => 'pregunta']);
    });
    Route::get('mis-examenes', [ExamenController::class, 'mios'])->name('mis-examenes');
    Route::get('calificaciones', [CalificacionController::class, 'index'])->name('calificaciones');
    Route::get('realizar-examen/{examen}', [ExamenController::class, 'realizar'])->name('realizar-examen');
    Route::post('realizar-examen/{examen}', [ExamenController::class, 'calificar'])->name('calificar-examen');
    Route::resource('preguntas', PreguntaController::class)->only(['edit', 'update', 'show', 'destroy'])->parameters(['preguntas' => 'pregunta']);
    Route::get('actividade/{uuid}/download', [ActividadeController::class, 'download'])->name('actividade.download');
    Route::get('descarga/{uuid}/download', [EntregadeactividadeController::class, 'download'])->name('descarga.download');
    Route::resource('entregadeactividades',EntregadeactividadeController::class);
});