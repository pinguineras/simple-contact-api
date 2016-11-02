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

$app->get('contact/{id}', 'ContactController@get');
$app->post('contact', 'ContactController@create');
$app->put('contact/{id}', 'ContactController@update');
$app->delete('contact/{id}', 'ContactController@delete');


//$app->group(['namespace' => 'App\Http\Controllers'], function($app)  {
//
//    /* Contact methods */
//    $app->group(['prefix' => 'contact'], function($app) {
//        $app->get('/{id}', 'ContactController@get');
//        $app->post('/', 'ContactController@create');
//        $app->put('/{id}', 'ContactController@update');
//        $app->delete('/{id}', 'ContactController@delete');
//    });
//
//});