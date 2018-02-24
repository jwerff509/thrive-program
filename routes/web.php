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


Route::resource('groups', 'GroupsController');
Route::resource('groups.group_details', 'GroupDetailsController');
Route::resource('group_sales_locations', 'GroupSalesLocationsController');
Route::resource('group_member_details', 'GroupMemberMetricsController');
Route::resource('person', 'PersonController');
Route::resource('income', 'IncomeController');
Route::resource('ppi', 'PpiController');
Route::resource('Dashboard', 'PpiController');

Route::model('groups', 'Group');
Route::model('group_details', 'GroupDetails');
Route::model('group_sales_locations', 'GroupSalesLocations');

Route::model('group_member_metrics', 'GroupMemberMetrics');

Route::model('person', 'PersonSurvey');
Route::model('income', 'Income');
Route::model('ppi', 'Ppi');
Route::model('dashboard', 'Ppi');

Route::get('groups/{id}/group_details/create', 'GroupDetailsController@create');
Route::get('groups/{id}/group_details/{groupDetailsID}/create', 'GroupMemberMetricsController@create');
/*
Route::get('groups/{id}/group_details/{groupDetailsID}/create', function() {
  $members = Person::all();
  return view('group_member_details.create')->with('members', $members);
});
*/
Route::get('person/{id}/income/create', 'IncomeController@create');
Route::get('person/{id}/ppi/create', 'PpiController@create');



Route::get('groups/{id}/group_details/{groupDetailsID}/person/create2', 'PersonController@create2');
Route::get('groups/{id}/group_details/{groupDetailsID}/person/create', 'PersonController@create');

/*
Route::get('create2', function() {
  return view('person.create2', [
    'groupID' => $groupID,
    'groupDetailsID' => $groupDetailsID
  ]);
});
*/

/* Testing */
Route::get('groups.create', 'AjaxDemoController@groupsCreate');
Route::post('select-ajax', ['as' => 'select-ajax', 'uses' => 'AjaxDemoController@selectAjax']);


Route::get('/search', function() {
    return view('groups.search');
});
Route::get('/groups/find', 'GroupsController@find');


// Routes for testing Select2.js
Route::get('/tags', function() {
  return view('tags');
});
Route::get('/tags/find', 'TagController@find');




// Route for chartjs
Route::get('chartjs', 'ReportsController@chartjs');
Route::get('dashboard', 'ReportsController@chartjs');
Route::get('pillars', 'ReportsController@pillars');



Route::post('group_details/store', [
  'as' => 'group_details.store',
  'uses' => 'GroupDetailsController@store'
  ]);

Route::post('group_member_metrics/store', [
  'as' => 'group_member_metrics.store',
  'uses' => 'GroupMemberMetricsController@store'
  ]);

Route::post('income/store', [
  'as' => 'income.store',
  'uses' => 'IncomeController@store'
  ]);

Route::post('ppi/store', [
  'as' => 'ppi.store',
  'uses' => 'PpiController@store'
  ]);
