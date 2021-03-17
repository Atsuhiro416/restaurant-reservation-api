<?php

// use Illuminate\Http\Request;
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

Route::post('/register', 'RegisterController@post');
Route::post('/login', 'LoginController@post');
Route::post('/logout', 'LogoutController@post');
Route::get('/user', 'UserController@get');
Route::put('/user', 'UserController@put');
Route::post('/owner', 'OwnersController@post');
Route::apiResource('/store', 'StoresController');
Route::post('/like', 'LikesController@store');
Route::delete('/like', 'LikesController@destroy');
Route::get('/my-like/{user}', 'LikesController@get_my_likes');
Route::get('/like-exist/{user}/{store}', 'LikesController@is_like_exist');
Route::post('/history', 'HistoryController@store');
Route::put('/history', 'HistoryController@update');
Route::get('/my-histories/{user}', 'HistoryController@get_my_histories');
