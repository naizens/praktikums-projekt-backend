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
    $router->get('/manageEmployees', 'PersonController@renderManageEmployees');
    $router->post('/acceptRequest', 'PersonController@acceptVacation');
    $router->post('/declineRequest', 'PersonController@declineVacation');
    $router->get("/people","PersonController@index");
    $router->get("/logout", "ActionController@logout");
});

$router->get("/login","ActionController@index");
$router->post("/login","ActionController@submit");

$router->get("/schoolholidays", function () {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ferien-api.de/api/v1/holidays/NW/2022",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return response()->json(json_decode($response));
});

