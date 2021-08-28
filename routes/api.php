<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//token generators
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {

    //erase token if exists
    Route::post('logout', [AuthController::class, 'logout']);

    //returns all tareas 
    Route::get('/tareas/consultar',[TareaController::class, 'index']);
    
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
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


