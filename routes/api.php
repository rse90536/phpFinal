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

Route::post('register','UserController@register');
Route::post('login','UserController@login');
Route::post('getComments','CommentController@getComments');
Route::group(['middleware'=>'jwtAuth'],function(){
    Route::post('comment','CommentController@comment');
    Route::post('getUserData','UserController@login');
    Route::post('logout','UserController@logout');
});

