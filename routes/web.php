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

// Bootstrap typeahed js functionality for the Group creation page
Route::get('groupsFind/{QUERY}', array('as' => 'groupsFind', 'uses' => 'GroupSurveysController@groupsFind'));
Route::get('zonesFind/{QUERY}', array('as' => 'zonesFind', 'uses' => 'GroupSurveysController@zonesFind'));
Route::get('villagesFind/{QUERY}', array('as' => 'villagesFind', 'uses' => 'GroupSurveysController@villagesFind'));


//Route::get('groups/ind_survey', 'GroupsController@ind_survey');
//Route::get('group_details/ind_survey_details', 'GroupDetailsController@ind_survey_details');
//Route::get('groups/{id}/group_details/ind_survey_details', 'GroupDetailsController@ind_survey_details');

Route::get('/export-to-excel', 'ReportsController@export');

Route::resource('groups', 'GroupsController');
//Route::resource('groups.group_details', 'GroupDetailsController');
Route::resource('group_sales_locations', 'GroupSalesLocationsController');
//Route::resource('group_member_details', 'GroupMemberMetricsController');
Route::resource('person', 'PersonController');
Route::resource('income', 'IncomeController');
Route::resource('ppi', 'PpiController');
Route::resource('Dashboard', 'PpiController');

Route::model('groups', 'Group');
//Route::model('group_details', 'GroupDetails');
Route::model('group_sales_locations', 'GroupSalesLocations');
//Route::model('group_member_metrics', 'GroupMemberMetrics');
Route::model('person', 'PersonSurvey');
Route::model('income', 'Income');
Route::model('ppi', 'Ppi');
Route::model('dashboard', 'Ppi');


// New route that gets the Groups form array data
//Route::get('/group_details/create', 'GroupDetailsController@create');
// Old route below
//Route::get('groups/{id}/group_details/create', 'GroupDetailsController@create');

Route::get('/group_surveys/create', ['middleware' => 'auth', 'uses' => 'GroupSurveysController@create']);
Route::get('/group_surveys/create2', ['middleware' => 'auth', 'uses' => 'GroupSurveysController@create2']);

//Route::get('groups/{surveyDetailsID}/group_details/{groupDetailsID}/create', 'GroupMemberMetricsController@create');

Route::get('person/{id}/income/create', 'IncomeController@create');
Route::get('person/{id}/ppi/create', 'PpiController@create');

//Route::get('groups/{id}/group_details/{groupDetailsID}/person/create2', 'PersonController@create2');
//Route::get('groups/{id}/group_details/{groupDetailsID}/person/create', 'PersonController@create');

// Route for chartjs
Route::get('chartjs', ['middleware' => 'auth', 'uses' => 'ReportsController@chartjs']);
Route::get('dashboard', ['middleware' => 'auth', 'uses' => 'ReportsController@chartjs']);
Route::get('pillars', ['middleware' => 'auth', 'uses' => 'ReportsController@pillars']);
Route::get('progress_reports', ['middleware' => 'auth', 'uses' => 'ReportsController@progress_reports']);


/*
Route::post('group_details/store', [
  'as' => 'group_details.store',
  'uses' => 'GroupDetailsController@store'
  ]);
*/


Route::post('group_surveys/store', [
  'as' => 'group_surveys.store',
  'uses' => 'GroupSurveysController@store'
  ]);

Route::post('group_surveys/store2', [
  'as' => 'group_surveys.store2',
  'uses' => 'GroupSurveysController@store2'
  ]);



/*
Route::post('group_member_metrics/store', [
  'as' => 'group_member_metrics.store',
  'uses' => 'GroupMemberMetricsController@store'
  ]);
*/
Route::post('income/store', [
  'as' => 'income.store',
  'uses' => 'IncomeController@store'
  ]);

Route::post('ppi/store', [
  'as' => 'ppi.store',
  'uses' => 'PpiController@store'
  ]);
