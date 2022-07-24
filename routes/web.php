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


$router->group(['middleware' => 'auth'], function() use ($router) {
    $router->get('/main', 'PersonController@renderMain');
    $router->get('/dashboard', 'PersonController@renderDashboard');
    $router->get('/calendar', 'PersonController@renderCalendar');
    $router->post('/calendar/submit', "PersonController@submit");
    $router->get('/profile', 'PersonController@renderProfile');
    $router->get('/employees', 'PersonController@renderEmployees');
    $router->get('/vacations', 'PersonController@renderVacations');

    $router->get('/kalender', "PersonController@render");
    $router->get("/people","PersonController@index");
    $router->post('/kalender/submit', "PersonController@submit");
    $router->get("/logout", "ActionController@logout");
});

$router->get("/login","ActionController@index");
$router->post("/login","ActionController@submit");



