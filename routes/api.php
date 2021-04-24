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
Route::get('tasks', 'TaskController@getAll');
Route::get('tasks/{id}', 'TaskController@getById');
Route::get('tasks/{title}/like/{value}', 'TaskController@filterByFied');
Route::post('tasks', 'TaskController@create');
Route::put('tasks/{id}', 'TaskController@update');
Route::delete('tasks/{id}', 'TaskController@delete');
