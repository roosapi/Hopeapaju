<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'Controller@index');
    Route::get('puoliveriset', 'HorselistController@pv');
    Route::get('kasvatus', 'HorselistController@kasvatit');
    Route::get('hallinta', 'HorselistController@showAll');

    Route::get('hevoset/create', 'HorseController@create');
    Route::get('hevoset/{name}', 'HorseController@show');
    Route::get('hevoset/{id}/edit', 'HorseController@edit');
    Route::patch('hevoset/{id}', 'HorseController@update');
    Route::post('hevoset', 'HorseController@store');
});
