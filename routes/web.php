<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RedirectController;
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


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/', function () {
    return redirect()->route('blog.index');
});

Route::view('/solutions', 'pages/solutions');


Route::group(
	[
		'namespace' => 'App\Http\Controllers',
	],
	function () {

		Route::group(['prefix' => 'ebook-whitepaper-infographic'], function () {
			Route::get('/', 'MaterialController@getMaterialPage')->name('materials.index');
			Route::get('/category/{category}', 'MaterialController@getMaterialCategory')->name('materials.category');
			Route::get('/thank-you', 'MaterialController@show')->name('materials.thankyou');
			Route::get('/{slug}', 'MaterialController@show')->name('materials.show');
		});

		Route::group(['prefix' => 'blog'], function () {
			Route::view('/glossary', 'pages/glossary')->name('glossary');
			Route::get('/category/{category}', 'PostController@getBlogByCategory')->name('blog.category');
			Route::get('/tag/{slug}', 'PostController@getBlogByTag')->name('blog.tag');
			Route::get('/search', 'PostController@searchBlog')->name('blog.search');
			Route::get('/recent-articles', 'PostController@getBlogRecent')->name('blog.recent');
			Route::get('/', 'PostController@getBlog')->name('blog.index');
			Route::get('/{slug}', 'PostController@show')->name('blog.detail');
		});

		Route::post('/newsletters', 'NewsletterController@store')->name('add-newsletters');
		Route::get('/logout', 'Auth\LoginController@logout');

	}
);

/**
 * RCMS
 */
Route::group(
	[
		'prefix' => 'rcms',
		'namespace' => 'App\Http\Controllers',
		'middleware' => ['web'],
		'as' => 'rcms.'
	],
	function () {
		Route::group(['middleware' => ['rcms']], function () {
			Route::resource('/posts', 'PostController');
			Route::patch('/posts/{id}/update-fillable', 'PostController@updateField');
			Route::resource('/tags', 'TagController')->only([
				'index', 'store', 'destroy', 'update'
			]);
			Route::resource('/categories', 'CategoryController')->only([
				'index', 'store', 'destroy', 'update'
			]);;
			Route::resource('/redirect-links', 'RedirectLinkController');
			Route::view('/redirect-links-import', 'cms/redirect_links/import')->name('redirect-links-import');
			Route::post('/redirect-links-import', 'RedirectLinkController@storeImport')->name('redirect.import');
			Route::resource('/materials', 'MaterialController')->except('show');
			Route::resource('url-configs', 'UrlConfigController');
		});
	}
);
Route::view('/remove-login', 'layouts/remove_login');
