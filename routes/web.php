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

Route::get('/home', 'HomeController@index');

// TODO Delete Leads
Route::get('/leads', 'LeadController@index');
Route::get('/leads/new', 'LeadController@create');
Route::get('/leads/{id}', 'LeadController@edit');
Route::post('/leads/{id}', 'LeadController@update');
Route::post('/leads', 'LeadController@new_lead');

Route::get('/contents', 'ContentsAdministration@list');
Route::get('/contents/new', 'ContentsAdministration@create');
Route::get('/contents/{id}', 'ContentsAdministration@edit');
Route::post('/contents/{id}', 'ContentsAdministration@update');
Route::post('/contents', 'ContentsAdministration@new_content');

Route::get('/landing_page', 'LandingPage@index');
Route::post('/landing_page', 'LandingPage@index');
