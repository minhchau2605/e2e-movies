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

Route::get('/','User\IndexController@index')->name('index');
Route::get('admin/login','Admin\IndexController@showLogin')->name('login');
Route::post('admin/login','Admin\IndexController@loginHandle')->name('login.handle');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('/logout','Admin\IndexController@logout')->name('logout');
    Route::get('/index','Admin\IndexController@showAdminIndex')->name('show.admin.index');

    Route::group(['prefix' => 'movie'], function(){
        Route::get('/','Admin\MovieController@showMovieManager')->name('show.movie.manager');
    });
    Route::group(['prefix' => 'category'], function(){

    });
    Route::group(['prefix' => 'actor'], function(){

    });
});
