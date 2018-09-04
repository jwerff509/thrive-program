<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Multi-step form testing Routes - using session variable
Route::get('/group_surveys/create-step1', 'GroupSurveysController@createStep1');
Route::post('group_surveys/create-step1', [
  'as' => 'group_surveys.create-step1',
  'uses' => 'GroupSurveysController@postCreateStep1'
]);

Route::get('/group_surveys/create-step2', 'GroupSurveysController@createStep2');
Route::post('group_surveys/create-step2', [
  'as' => 'group_surveys.create-step2',
  'uses' => 'GroupSurveysController@postCreateStep2'
]);

// Routes for change password form
Route::get('/changePassword', ['as' => 'changePasswordForm', 'uses' => 'UserController@changePasswordForm']);
Route::post('/changePassword', ['as' => 'changePassword', 'uses' => 'UserController@changePassword']);

// Routes for managing users (available to admins only)
Route::get('/manage-users', ['middleware' => 'auth', 'uses' => 'UserController@show']);

// Bootstrap typeahed js functionality for the Group creation page
Route::get('groupsFind/{QUERY}', array('as' => 'groupsFind', 'uses' => 'GroupSurveysController@groupsFind'));
//Route::get('zonesFind/{QUERY}', array('as' => 'zonesFind', 'uses' => 'GroupSurveysController@zonesFind'));
//Route::get('zonesFind', array('as' => 'zonesFind', 'uses' => 'GroupSurveysController@zonesFind'));
Route::post('zonesFind', array('as' => 'zonesFind', 'uses' => 'GroupSurveysController@zonesFind'));
Route::get('villagesFind/{QUERY}', array('as' => 'villagesFind', 'uses' => 'GroupSurveysController@villagesFind'));

// Test Route for finding AP zones
Route::post('apZonesFind', ['as' => 'select-zone', 'uses' => 'GroupSurveysController@apZonesFind']);

Route::get('/export-to-excel', ['middleware' => 'auth', 'uses' => 'ReportsController@export']);
Route::get('/group_surveys/create', ['middleware' => 'auth', 'uses' => 'GroupSurveysController@create']);
Route::get('/group_surveys/create2', ['middleware' => 'auth', 'uses' => 'GroupSurveysController@create2']);

// Route for chartjs
Route::get('chartjs', ['middleware' => 'auth', 'uses' => 'ReportsController@chartjs']);
Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'ReportsController@chartjs']);
Route::get('pillars', ['middleware' => 'auth', 'uses' => 'ReportsController@pillars']);
Route::get('progress_reports', ['middleware' => 'auth', 'uses' => 'ReportsController@progress_reports']);

Route::post('group_surveys/store', [
  'as' => 'group_surveys.store',
  'uses' => 'GroupSurveysController@store'
  ]);

Route::post('group_surveys/store2', [
  'as' => 'group_surveys.store2',
  'uses' => 'GroupSurveysController@store2'
  ]);

  // Testing new dashboards
  Route::get('country-dbs', ['as' => 'country-dbs', 'uses' => 'DashboardController@countryIndex']);
  Route::get('country-dashboard/{id}', ['as' => 'country-dashboard', 'uses' => 'DashboardController@countryDashboard']);
  Route::get('elo-dashboard', ['middleware' => 'auth', 'uses' => 'DashboardController@eloDashboard']);

/*
  Route::resource('program-targets', 'ProgramTargetsController');
*/
  Route::get('program-targets/index', ['as' => 'program-targets.index', 'middleware' => 'auth', 'uses' => 'ProgramTargetsController@index']);
  Route::get('program-targets/create', ['middleware' => 'auth', 'uses' => 'ProgramTargetsController@create']);
  Route::get('program-targets/edit/{id}', ['as' => 'program-targets.edit', 'middleware' => 'auth', 'uses' => 'ProgramTargetsController@edit']);
  Route::get('program-targets/show/{id}', ['as' => 'program-targets.show', 'middleware' => 'auth', 'uses' => 'ProgramTargetsController@show']);
  Route::post('program-targets/store', ['as' => 'program-targets.store', 'middleware' => 'auth', 'uses' => 'ProgramTargetsController@store']);
  Route::post('program-targets/update/{id}', ['as' => 'program-targets.update', 'middleware' => 'auth', 'uses' => 'ProgramTargetsController@update']);


  Route::get('program-measures/enter', ['middleware' => 'auth', 'uses' => 'ProgramMeasuresController@create']);
  Route::get('program-measures/edit', ['middleware' => 'auth', 'uses' => 'ProgramMeasuresController@edit']);
  Route::post('program-measures/store', ['as' => 'program_measures.store', 'middleware' => 'auth', 'uses' => 'ProgramMeasuresController@store']);
