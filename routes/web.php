<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

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


//todas las tareas
Route::get('/tareas/consultar', [App\Http\Controllers\TareaController::class, 'index']);

//tareas finalizadas
Route::get('/tareas/consultar/finalizadas', [App\Http\Controllers\TareaController::class, 'finished']);

//tareas en proceso
Route::get('/tareas/consultar/enprogreso', [App\Http\Controllers\TareaController::class, 'inProgress']);

//organizadas por fecha de vencimiento
Route::get('/tareas/consultar/vencimiento', [App\Http\Controllers\TareaController::class, 'byDueDate']);

//borrar una tarea
Route::delete('/tareas/borrar/{id}', [App\Http\Controllers\TareaController::class, 'destroy']);

//crear una tarea
Route::post('/tareas/crear', [App\Http\Controllers\TareaController::class, 'store']);

//actualizar una tarea
Route::put('/tareas/actualizar/{id}', [App\Http\Controllers\TareaController::class, 'update']);

