<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/admin/category/save','Admin\CategoryController@index');
Route::get('/admin/category/parent','Admin\CategoryController@parent');
Route::get('/admin/category/all','Admin\CategoryController@all');
Route::get('/admin/category/{id}','Admin\CategoryController@getCategory');
Route::patch('/admin/category/update/{id}','Admin\CategoryController@update');
Route::delete('/admin/deletecategory/{id}','Admin\CategoryController@destroy');

Route::prefix('admin')->group(function (){
    Route::get('/allusers','Admin\UserController@allusers');
    Route::post('/user/save','Admin\UserController@save');
    Route::patch('/user/update/{id}','Admin\UserController@update');
    Route::delete('/user/delete/{id}','Admin\UserController@destroy');
});