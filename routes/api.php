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

Route::get('/displayAllProduct','ProductController@displayAllProduct');
Route::get('/displayProduct/{id}','ProductController@displayProduct');
Route::get('/search','ProductController@search');
Route::get('/filter','ProductController@filter');
Route::post('/addProduct','ProductController@addProduct');
Route::post('/editeProduct/{id}','ProductController@editeProduct');
Route::delete('/deleteProduct/{id}','ProductController@deleteProduct');


