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

Route::model('groups', 'Group');
Route::model('group_details', 'GroupDetails');
Route::model('group_sales_locations', 'GroupSalesLocations');
Route::model('group_member_metrics', 'GroupMemberMetrics');
Route::model('person', 'Person');
Route::model('income', 'Income');

Route::get('groups/{id}/group_details/create', 'GroupDetailsController@create');
Route::get('groups/{id}/group_details/{groupDetailsID}/create', 'GroupMemberMetricsController@create');
Route::get('person/{id}/income/create', 'IncomeController@create');

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
