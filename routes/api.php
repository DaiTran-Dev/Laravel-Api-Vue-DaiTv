<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//API Task
Route::group(['namespace' => 'Task'], function () {
    Route::get('tasks', 'TaskController@getAllTask');
    Route::get('tasks/{id}', 'TaskController@getTaskById');
    Route::post('tasks', 'TaskController@createTask');
    Route::put('tasks/{id}', 'TaskController@updateTask');
    Route::delete('tasks/{id}', 'TaskController@deleteTask');
    Route::get('tasks/{title}/like/{value}', 'TaskController@filterTaskByFied');
});
