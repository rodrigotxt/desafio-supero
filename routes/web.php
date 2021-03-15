<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// apis para controlar as Tasks
$router->group(['prefix' => 'api'], function ($router) {
    $router->group(['prefix' => 'tasks'], function ($router) {
        $router->get('/', 'TaskController@all');
        $router->post('/task', 'TaskController@update');
        $router->post('/task/{id?}', 'TaskController@update');
        $router->get('/task/{id}', 'TaskController@show');
        $router->delete('/task/{id}', 'TaskController@remove');
    });

});

// retorna qualquer requisao para o Vue.js frontend
$router->get('/{route:.*}/', function ()  {
    return view('app');
});