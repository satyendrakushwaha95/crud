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

date_default_timezone_set("Asia/Kolkata");

Route::resource('articles', 'ArticlesController');

Route::post('/addArticle','ArticlesController@addArticle')->name('addArticle');
Route::any('/edit','ArticlesController@edit')->name('edit');
Route::post('/update','ArticlesController@update')->name('update');
Route::post('/updateData','ArticlesController@updateData')->name('updateData');
Route::get('/deleteData','ArticlesController@deleteData')->name('deleteData');

Route::get('/data/download/articles',
    [
        'as' => 'data/download/articles',
        'uses' => 'ArticlesController@getArticles'
    ]
);



Route::resource('blogs', 'BlogsController');
Route::get('/data/download/blogs',
    [
        'as' => 'data/download/blogs',
        'uses' => 'BlogsController@getBlogs'
    ]
);
Route::get('/download', 'BlogsController@download');
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

Route::get('/about', 'PagesController@about')->name('about');
Route::get('/profile', 'PagesController@profile')->name('profile');
Route::get('/design1', 'PagesController@design1')->name('design1');
Route::get('/design2', 'PagesController@design2')->name('design2');
Route::get('/design3', 'PagesController@design3')->name('design3');

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adminPanel', 'ACLController@adminPanel')->name('adminPanel');
Route::get('/adminPanelEdit', 'ACLController@adminPanelEdit')->name('adminPanelEdit');