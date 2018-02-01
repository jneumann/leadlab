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

use App\Content as ContentModel;
use App\category_relationships;
use App\Http\Controllers\ContentsAdministration;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
	Route::get('/home', 'HomeController@index');

	Route::get('/leads', 'LeadController@index');
	Route::get('/leads/new', 'LeadController@create');
	Route::get('/leads/{id}', 'LeadController@edit');
	Route::get('/leads/{id}/delete', 'LeadController@delete');
	Route::post('/leads/{id}', 'LeadController@update');
	Route::post('/leads', 'LeadController@new_lead');

	Route::get('/contents', 'ContentsAdministration@list');
	Route::get('/contents/new', 'ContentsAdministration@create');
	Route::get('/contents/{id}', 'ContentsAdministration@edit');
	// Route::post('/contents/{id}', 'ContentsAdministration@update');
	// Route::post('/contents', 'ContentsAdministration@new_content');
	Route::post('/contents/{id}', function (Request $request) {
		$contents = ContentModel::find($request->id);

		$contents->id = $request->id;
		$contents->title = $request->title;
		$contents->content = $request->contents;
		$contents->type = $request->post_type;
		$contents->owner = $request->owner;

		$contents->save();

		$relationships = new category_relationships();
		$relationships->save([
			'title' => $request->title,
			'content' => $request->contents,
			'type' => $request->post_type,
			'owner' => $request->owner,
			'category' => $request->categories,
			'id' => $request->id,
		]);

		$contents_admin = new ContentsAdministration($request);
		return $contents_admin->list();
	});

	Route::post('/contents', function (Request $req) {
		$contents = new ContentModel;

		$contents->title = $req->title;
		$contents->content = $req->contents;
		$contents->type = $req->post_type;
		$contents->owner = $req->owner;

		$id = $contents->save();

		$relationships = new category_relationships();
		$relationships->save([
			'title' => $req->title,
			'content' => $req->contents,
			'type' => $req->post_type,
			'owner' => $req->owner,
			'category' => $req->category,
		], $id);

		$contents_admin = new ContentsAdministration($req);
		return $contents_admin->list();
	});

	Route::get('/categories', 'categories@index');
	Route::get('/categories/new', 'categories@create');
	Route::get('/categories/{id}', 'categories@show');
	Route::post('/categories', 'categories@store');
	Route::post('/categories/{id}', 'categories@update');
});

Route::get('/landing_page', 'LandingPage@index');
Route::post('/landing_page', 'LandingPage@index');

Route::get('/page/{handle}', 'Contents@show');
Route::get('/post/{handle}', 'Contents@show');
