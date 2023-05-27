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

//route to my root folder
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//unsecure routes
$router->group(['prefix' => 'api'], function($router) {
    $router->get('/users',['uses' => 'userController@getUsers']);
});

    //simple routes
    $router->get('/users', 'userController@index');
    $router->post('users', 'userController@showUsers');
    $router->get('users/{id}', 'userController@showUser');
    $router->put('users/{id}', 'userController@addUser');
    $router->delete('users/{id}', 'userController@deleteUser');
    $router->patch('/users/{id}', 'userController@updateUser');

    //userjob routes
    $router->get('/usersjob', 'UserJobController@index');
    $router->get('/userjob/{id}', 'UserJobController@show'); // get user by id