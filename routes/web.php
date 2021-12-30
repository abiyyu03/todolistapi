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

$router->get('/', function () use ($router) {
    dd(DB::getPDO());
});
//activity_groups
$router->get('activity-groups','ActivityGroupController@getAll');
$router->post('activity-groups','ActivityGroupController@create');
$router->get('activity-groups/{id}','ActivityGroupController@getOne'); 
$router->delete('activity-groups/{id}','ActivityGroupController@delete');
$router->patch('activity-groups/{id}','ActivityGroupController@update');

//todo-items
$router->get('todo-items','TodoItemController@getAll');
$router->post('todo-items','TodoItemController@create');
$router->get('todo-items/{id}','TodoItemController@getOne'); 
$router->delete('todo-items/{id}','TodoItemController@delete');
$router->patch('todo-items/{id}','TodoItemController@update');
