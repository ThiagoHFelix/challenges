<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    return $router->app->version();
});

// $router->get('/hero', ['middleware' => 'auth', function (Request $request) {
// $router->get('/user', "UserController@index");
// $router->post('/user', "UserController@store");

$router->group(['middleware' => 'auth', 'prefix' => 'api'], function () use ($router) {

    $router->get('/hero', "HeroController@index");


});





