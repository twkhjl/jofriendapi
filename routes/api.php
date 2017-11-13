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


//----test crud---

Route::get('tests','TestController@index')->middleware('cors');
Route::get('test/{id}','TestController@show');
Route::delete('test/{id}','TestController@destroy');
Route::put('test','TestController@store');
Route::post('test','TestController@store');

//----test auth---



