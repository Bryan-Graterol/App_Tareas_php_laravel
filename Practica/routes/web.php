<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;
use App\Http\Controllers\CategoriaController;


// Estructura de ruta basica

Route::get('/', function () {
    return view("app");
});


/*
GET: Conseguir Datos
POST: Guardar Datos
PUT: Actualizar Datos
DELETE: Eliminar Datos
*/

Route::get('/tareas', [todosController::class, 'index'])->name('todos');

/*
Route::get('/todos', function(){
    return view("index");
});
*/

Route::post('/tareas', [todosController::class, 'store'])->name('todos');

Route::get('/tareas/{id}', [todosController::class, 'show'])->name('todos-edit');
Route::patch('/tareas/{id}', [todosController::class, 'update'])->name('todos-update');
Route::delete('/tareas/{id}', [todosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categorias', CategoriaController::class);
