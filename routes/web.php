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

/////////////////////////////////////////////////////////////////////////////////
Route::get('/test', 'TestController@index');
Route::get('/test/email', 'TestController@email');


Route::get('/reminder', 'ReminderEmailController@store');


///////////////////////////////////////////////////////////////////////////////////
Route::get('/home', 'HomeController@index')->name('home');

// 前台的路由
Route::get('article/{id}', 'ArticleController@show')->middleware('web');

Route::post('comment/store', 'CommentController@store')->middleware('check.my.login', 'web');

// 后台的路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'web']], function()
{
    Route::get('/', 'HomeController@index');

    Route::get('test/', 'TestController@index');


    // 资源控制器
    Route::resource('article', 'ArticleController');

    Route::resource('comment', 'CommentController');
});