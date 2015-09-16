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
    return view('welcome');
});

// Route::get('about', 'AboutController@index');
// Route::get('about/create', 'AboutController@create');
// Route::post('about', 'AboutController@store');
// // 'about/{id}' the id is a wildcard, if anything is at the end of about/ it will capture it
// Route::get('about/{id}', 'AboutController@show');

Route::resource('about', 'AboutController');
