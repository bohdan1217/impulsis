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


Route::get('book/api',[
    'as' => 'book.api',
    'uses' => 'API\BookApiController@index'
]);



Route::group(['middleware'=>'web'], function () {
    Route::match(['get', 'post'],'/', ['uses' =>'IndexController@index', 'as' => 'home']);
    Route::get('/book/{book}', ['uses' =>'IndexController@show', 'as' => 'showBook']);
    Route::match(['get', 'post'], '/add', ['uses' => 'IndexController@create', 'as' => 'bookAdd']);
    Route::match(['get', 'post'], '/edit/{book}', ['uses' => 'IndexController@edit', 'as' => 'bookEdit']);
});