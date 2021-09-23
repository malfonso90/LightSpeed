<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProjectsController;


Route::get('/', function () { return view('index'); });
Route::get('/dashboard', function () { return view('/dashboard'); });

Route::get('/projects', function() { return view('/projects'); });
Route::post('/api/Proyectos_server-side', function () {
    return view('/api/Proyectos_server-side');
});

Route::get('/developers', function() { return view('/developers'); });
Route::post('/api/Usuarios_server-side', function () {
    return view('/api/Usuarios_server-side');
});

Route::get('/tasks', function() { return view('/tasks'); });
Route::post('/api/Tasks_server-side', function () {
    return view('/api/Tasks_server-side');
});

Route::get('/tasks/{id}',  [TasksController::class, 'projectTasks']);
Route::get('/tasksMember/{id}',  [TasksController::class, 'taskMember']);
Route::get('/projects/{id}',  [ProjectsController::class, 'memberProjects']);
