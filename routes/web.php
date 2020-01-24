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

Route::get('/', 'TopController@show');

Route::get('/introduction', 'TopController@introduction');

Route::get('article/search', 'User\ArticleController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user','middleware' => 'auth'], function() {
    Route::get('article/create', 'User\ArticleController@add');
    Route::post('article/create', 'User\ArticleController@create');
    Route::get('article/index', 'User\ArticleController@index');
    Route::get('article/{article}/edit', 'User\ArticleController@edit');
    Route::put('article/{article}', 'User\ArticleController@update');
    Route::delete('article/{article}', 'User\ArticleController@destroy');
    Route::get('/mypage', 'User\ArticleController@mypage');
    
    Route::get('profile/{user}/edit', 'User\UserController@edit');
    Route::put('profile/{user}', 'User\UserController@update');
    Route::get('article/likes/{user}', 'User\ArticleController@likes');
});

Route::get('article/{article}', 'User\ArticleController@show');
Route::get('article/genre/{genre}', 'User\ArticleController@genre');
Route::get('article/monthly/{user}/{monthly}', 'User\ArticleController@monthly');

Route::get('profile/{user}', 'User\UserController@show')->name('profile.show');

Route::post('/article/{article}/likes', 'LikesController@store');
Route::post('/article/{article}/likes/{like}', 'LikesController@destroy');

Route::get('/tags/{id}/article', 'User\ArticleController@showByTag')->name('tags.article');

//Route::get('/mypage/{name}', 'User\ArticleController@index');