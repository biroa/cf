<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::to('auth/login');
});

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::resource('api/messages', 'ConversionMessageController');
Route::get('api/currencies', 'CurrencyController@index'); //only get allowed

//Todo:: remove after at the end of the work
Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});