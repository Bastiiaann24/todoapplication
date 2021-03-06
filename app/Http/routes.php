<?php

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

$app->get('/', 'ItemsController@index');

//API
$app->get('api/items', 'ApiItemController@index');
$app->post('api/items', 'ApiItemController@store');
$app->get('api/items/{id}', 'ApiItemController@show');
$app->patch('api/items/{id}', 'ApiItemController@update');
$app->delete('api/items/{id}', 'ApiItemController@destroy');


