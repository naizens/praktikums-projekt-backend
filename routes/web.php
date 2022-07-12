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
    return $router->app->version();
});
$router->get("/people","PersonController@index");

$router->get('/kalender', function () use ($router) {
    dd(\Illuminate\Support\Facades\Auth::user());
    return view("index", []);
});

$router->get("/login","ActionController@index");
$router->post("/login","ActionController@submit");

$router->post("/kalender/submit","PersonController@submit");

