<?php

use Illuminate\Support\Facades\Route;
//agregamos controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\EntregadeactividadeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('contenidos', ContenidoController::class);
    Route::resource('grupos', GrupoController::class);
    Route::resource('actividades', ActividadeController::class);
    Route::resource('materias', MateriaController::class);
    Route::get('actividade/{uuid}/download', [ActividadeController::class, 'download'])->name('actividade.download');
    Route::get('descarga/{uuid}/download', [EntregadeactividadeController::class, 'download'])->name('descarga.download');
    Route::resource('entregadeactividades',EntregadeactividadeController::class);
});