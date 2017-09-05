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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/appKey', function () use ($app) {
    return str_random('32');
});

//$app->get('users', 'UserController@index');
//$app->post('users', 'UserController@store');
//$app->get('users/{id}', 'UserController@show');
//$app->put('users/{id}', 'UserController@update');
//$app->delete('users/{id}', 'UserController@destroy');

$app->group(['middleware' => 'auth:api'], function () use ($app) {
    $app->get('users', 'UserController@index');
    $app->post('users', 'UserController@store');
    $app->get('users/{id}', 'UserController@show');
    $app->put('users/{id}', 'UserController@update');
    $app->delete('users/{id}', 'UserController@destroy');
});

Dusterio\LumenPassport\LumenPassport::routes($app);