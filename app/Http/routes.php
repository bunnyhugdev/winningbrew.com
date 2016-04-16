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
    Route::get('/entry/{entry}', 'EntryController@view');
    Route::post('/entry/update/{entry}', 'EntryController@update');
    Route::delete('/entry/{entry}', 'EntryController@destroy');
    Route::get('/entries/competition/{id}', 'EntryController@competition');
    Route::get('/entries/labels', 'EntryController@labels');

    Route::get('/', 'DashboardController@index');

    Route::post('/payment', 'EntryController@payment');
    Route::get('/paypal', 'EntryController@paypal');
    Route::get('/postpayment', 'EntryController@postpayment');

    Route::get('/profile/{user}', 'UserController@profile');
    Route::post('/profile/{user}', 'UserController@update');

    Route::post('/receive/entry/{entry}', 'CompetitionController@receive_entry');
    Route::post('/receive/comment/{entry}', 'CompetitionController@receive_comment');
    Route::get('/competition/receive-sheets/{competition}', 'CompetitionController@receive_sheets');
    Route::get('/competition/admin/{competition}', 'CompetitionController@admin');
    Route::get('/competition/receive/{competition}', 'CompetitionController@receive_info');
    Route::get('/competition/receive/{competition}/{style}', 'CompetitionController@receive_style');

    Route::get('/competition/pull_sheets/{competition}', 'CompetitionController@pull_sheets');
    Route::get('/competition/judge_sheets/{competition}', 'CompetitionController@judge_sheets');
    Route::get('/competition/category_xref/{competition}', 'CompetitionController@entrantsForCategory');
    Route::get('/competition/user_entries/{competition}', 'CompetitionController@entriesForEntrant');

    Route::get('/competition/results/{competition}', 'CompetitionController@resultCategories');
    Route::get('/competition/results/{competition}/{category}', 'CompetitionController@entriesForCategoryResults');
    Route::post('/competition/result/{entry}', 'CompetitionController@score');
    Route::post('/competition/place/{competition}/{category}', 'CompetitionController@place');
    Route::get('/competition/bos-sheet/{competition}', 'CompetitionController@bosPullSheets');
    Route::get('/competition/bos-judge-sheet/{competition}', 'CompetitionController@bosJudgeSheets');
});
