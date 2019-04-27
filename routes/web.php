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

//hello練習
Route::get('/','HelloController@index');
Route::get('index','IndexController@index');
Route::get('model/create','NewController@create');

// Route::get('hello','HelloController@index');

Route::get('hello/add','HelloController@add');
Route::post('hello/add','HelloController@create');

Route::get('hello/edit','HelloController@edit');
Route::post('hello/edit','HelloController@update');

Route::get('hello/del','HelloController@del');
Route::post('hello/del','HelloController@remove');

Route::get('hello','HelloController@index')->middleware('auth');

Route::get('hello/auth','HelloController@getAuth');
Route::post('hello/auth','HelloController@postAuth');


//person練習
Route::get('hello/show','HelloController@show');

Route::get('person','PersonController@index');
Route::get('person/find','PersonController@find');
Route::post('person/find','PersonController@search');

Route::get('person/add','PersonController@add');
Route::post('person/add','PersonController@create');

Route::get('person/edit','PersonController@edit');
Route::post('person/edit','PersonController@update');

Route::get('person/del','PersonController@delete');
Route::post('person/del','PersonController@remove');

// 掲示板練習
Route::get('board','BoardController@index');
Route::get('board/add','BoardController@add');
Route::post('board/add','BoardController@create');

Route::resource('rest','RestappController');

Route::get('hello/session','HelloController@ses_get');
Route::post('hello/session','HelloController@ses_put');

//twitter
// ツイート機能
Route::get('/twitter','TimelineController@index');
Route::get('/twitter/tweet','TimelineController@add');
Route::post('/twitter/tweet','TimelineController@create');
//ログイン機能
Route::get('/twitter/login','TwitterController@getAuth');
Route::post('/twitter/login','TwitterController@postAuth');
Route::get('/twitter/logout','TwitterController@getLogout');
// 新規登録機能
Route::get('/twitter/add','TwitterController@add');
Route::post('/twitter/add','TwitterController@create');
// プロフィール
Route::get('/twitter/mypage','TwitterController@mypage');
Route::get('/twitter/edit','TwitterController@edit');
Route::post('/twitter/edit','TwitterController@update');
// フレンド確認
Route::get('/twitter/friends','TwitterController@friends');
// Route::post('/twitter/friends','TwtFollowerController@follow');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
