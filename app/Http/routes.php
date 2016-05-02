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
  // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    //general pages
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'Controller@index');
    Route::get('puoliveriset', 'HorselistController@pv');
    Route::get('kasvatus', 'HorselistController@kasvatit');
    Route::get('hallinta', 'HorselistController@showAll');

    //horse cru(d)
    Route::get('hevoset/create', 'HorseController@create');
    Route::get('hevoset/{name}', 'HorseController@show');
    Route::get('hevoset/{id}/edit', 'HorseController@edit');
    Route::patch('hevoset/{id}', 'HorseController@update');
    Route::post('hevoset', 'HorseController@store');

    //horseimage cru(d)
    Route::get('hevoset/{id}/img/create', 'HorseImageController@create');
  //  Route::get('hevoset/img/{name}', 'HorseImageController@show');
    Route::get('hevoset/{id}/img/{imgid}/edit', 'HorseImageController@edit');
    Route::patch('hevoset/{id}/img/{imgid}', 'HorseImageController@update');
    Route::post('hevoset/{id}/img/', 'HorseImageController@store');

    //horse merit routes
    Route::get('hevoset/{id}/merit/create', 'MeritController@create');
    Route::post('hevoset/{id}/merit/', 'MeritController@store');

    //horse competition routes
    Route::get('hevoset/{id}/competition/create', 'CompetitionController@create');
    Route::post('hevoset/{id}/competition/', 'CompetitionController@store');

    //horse text routes
    Route::get('hevoset/{id}/text/create', 'TextController@create');
    Route::post('hevoset/{id}/text/', 'TextController@store');
});
