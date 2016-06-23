<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->resource('projects', 'App\Http\Controllers\ProjectsController', ['parameters' => 'singular']);
    $api->resource('projects/{project}/tasks', 'App\Http\Controllers\ProjectTasksController', ['parameters' => 'singular']);
    $api->resource('projects/{project}/tasks/{task}/reassignments', 'App\Http\Controllers\ReassignmentsController', ['parameters' => 'singular']);
    $api->resource('tasks', 'App\Http\Controllers\TasksController', ['parameters' => 'singular']);
    $api->get('me', 'App\Http\Controllers\UsersController@show');
    $api->put('me', 'App\Http\Controllers\UsersController@update');
});
