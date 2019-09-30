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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create');                         // 追記    
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');   //PHP/Laravel 12 ユーザー認証を実装する 課題2
    Route::post('profile/create', 'Admin\ProfileController@create');                   //PHP/Laravel 13 ニュース投稿画面を作成しよう 課題3
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');    //PHP/Laravel 12 ユーザー認証を実装する 課題3
    Route::post('profile/edit', 'Admin\ProfileController@update');                     //PHP/Laravel 13 ニュース投稿画面を作成しよう 課題6
});
