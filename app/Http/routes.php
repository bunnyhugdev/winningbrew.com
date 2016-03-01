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

Route::get('/', function () {
    return view('welcome');
});

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


Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/entries', 'EntryController@index');
    Route::post('/entry', 'EntryController@create');
    Route::delete('/entry/{entry}', 'EntryController@destroy');
    Route::get('/entries/competition/{id}', 'EntryController@competition');

    Route::get('/', 'DashboardController@index');

    Route::post('/payment', 'EntryController@payment');

    Route::get('/profile/{user}', 'UserController@profile');
    Route::post('/profile/{user}', 'UserController@update');

    //Route::get('/competitions', 'CompetitionController@index');
    //Route::post('/competition', 'CompetitionController@create');

});
