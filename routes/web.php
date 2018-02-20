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

Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/about', 'PagesController@about')->name('about');


Route::resource('articles', 'ArticlesController');
Route::resource('blogs', 'BlogsController');
/*
Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/create', 'ArticlesController@create' );
Route::get('/articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');

Route::get('/blogs','BlogsController@index')->name('blogs');
Route::get('/blogs/create','BlogsController@create');
Route::get('/blogs/{id}', 'BlogsController@show');
Route::post('/blogs','BlogsController@store');

*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

