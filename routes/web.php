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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('comunas', 'livewire.comunas.index')->middleware('auth');
	Route::view('regiones', 'livewire.regiones.index')->middleware('auth');
	Route::view('paises', 'livewire.paises.index')->middleware('auth');
	Route::view('cargos', 'livewire.cargos.index')->middleware('auth');

	Route::view('empleados', 'livewire.empleados.index')->middleware('auth');
