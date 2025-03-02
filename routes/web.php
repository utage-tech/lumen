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

$router->get( '/season/{season}/{steamID64}/stats', 'StatsController@index' );

$router->get('/', function () use ( $router ) {
    return response()->json(
      [
        'message'=> 'Welcome to UtageSocial !'
      ]
    );
});
