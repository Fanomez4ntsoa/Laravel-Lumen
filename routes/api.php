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

$router->group(['prefix' => 'on-boarding'], function ($router) {
    $router->post('check', 'AuthController@login');
});


$router->group(['prefix' => 'security', 'namespace' => 'Security'], function ($router) {
    $router->post('password/decode-token', 'PasswordController@decodeToken');
    $router->post('password/update', 'PasswordController@update');
});