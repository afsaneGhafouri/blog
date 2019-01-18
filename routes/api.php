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


Route::patch('/posts/{id}/{action}','PostController@vote');

Route::get('/posts','Api\PostController@getPosts');

Route::get('/posts/{id}','Api\PostController@getPost');

Route::post('/posts','Api\PostController@createPost')->middleware('jwt.auth');


Route::prefix('auth')->group(function () {
    Route::post('/login','Api\UserController@login');
    Route::post('/register','Api\UserController@register');
    Route::get('/logout','Api\UserController@logout');
});

Route::prefix('admin')->group(function () {
    Route::post('/login','Api\AdminController@login');
    Route::post('/register','Api\AdminController@register');
    Route::get('/logout','Api\AdminController@logout');
});