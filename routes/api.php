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



//API User
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');
});
Route::group(['middleware' => ['jwt.verify']], function () {
    //APIUser
    Route::group(['prefix' => 'auth'], function () {
        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::get('logout', 'UserController@logout');
    });

    //API Task
    Route::get('tasks', 'TaskController@getAll');
    Route::get('tasks/{id}', 'TaskController@getById');
    Route::get('tasks/{title}/like/{value}', 'TaskController@filterByFied');
    Route::post('tasks', 'TaskController@create');
    Route::put('tasks/{id}', 'TaskController@update');
    Route::delete('tasks/{id}', 'TaskController@delete');
});
