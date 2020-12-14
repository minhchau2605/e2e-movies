<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'],function(){
    Route::group(['prefix' => 'movie'], function(){
//        Route::get('/','Admin\MovieController@showMovieManager');
        Route::get('/list','Admin\MovieController@listMovie')->name('list.movie');
        Route::get('/detail/{id}','Admin\MovieController@detailMovie');
    });
    Route::group(['prefix' => 'category'], function(){

    });
    Route::group(['prefix' => 'actor'], function(){

    });
});
