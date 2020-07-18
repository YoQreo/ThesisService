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

$router->post('/thesis', ['as' => 'createThesis', 'uses' => 'ThesisController@store']);
$router->get('/thesis', ['as' => 'showAllThesis', 'uses' => 'ThesisController@index']);
$router->delete('/thesis/{id}', ['as' => 'deleteThesis', 'uses' => 'ThesisController@destroy']);
$router->put('/thesis/{id}', ['as' => 'updateThesis', 'uses' => 'ThesisController@update']);
$router->patch('/thesis/{id}', ['as' => 'updateThesis', 'uses' => 'ThesisController@update']);