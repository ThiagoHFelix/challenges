<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/auth'], function () use ($router) 
{

    $router->post('/register', "AuthController@register");
    $router->post('/login', "AuthController@login");

    $router->group(['middleware' => 'auth:api'], function () use($router) 
    {
        $router->get('/logout', "AuthController@logout");
    });
    
});

$router->group(['middleware' => 'auth:api', 'prefix' => 'api'], function () use ($router) 
{
    #CRUD Heroes
    $router->get('/hero', "HeroController@index");
    $router->post('/hero', "HeroController@store");
    $router->put('/hero/{id}', "HeroController@update");
    $router->delete('/hero/{id}', "HeroController@destroy");

    #CRUD Ranking
    $router->get('/ranking', "RankingController@index");
    $router->post('/ranking', "RankingController@store");
    $router->put('/ranking/{id}', "RankingController@update");
    $router->delete('/ranking/{id}', "RankingController@destroy");

    #CRUD Threat Level
    $router->get('/threatlevel', "ThreatLevelController@index");
    $router->post('/threatlevel', "ThreatLevelController@store");
    $router->put('/threatlevel/{id}', "ThreatLevelController@update");
    $router->delete('/threatlevel/{id}', "ThreatLevelController@destroy");

    #CRUD Threat
    $router->get('/threat', "ThreatController@index");
    $router->post('/threat', "ThreatController@store");
    $router->put('/threat/{id}', "ThreatController@update");
    $router->delete('/threat/{id}', "ThreatController@destroy");

    #CRUD Status
    $router->get('/status', "StatusController@index");
    $router->post('/status', "StatusController@store");
    $router->put('/status/{id}', "StatusController@update");
    $router->delete('/status/{id}', "StatusController@destroy");

    #CRUD Allocations
    $router->get('/allocation', "AllocationController@index");
    $router->post('/allocation', "AllocationController@store");
    $router->put('/allocation/{id}', "AllocationController@update");
    $router->delete('/allocation/{id}', "AllocationController@destroy");

});





