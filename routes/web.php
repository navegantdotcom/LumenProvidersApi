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

$router->get('/providers', 'ProviderController@index');
$router->post('/providers', 'ProviderController@store');
$router->get('/providers/{provider}', 'ProviderController@show');
$router->put('/providers/{provider}', 'ProviderController@update');
$router->patch('/providers/{provider}', 'ProviderController@update');
$router->delete('/providers/{provider}', 'ProviderController@destroy');
