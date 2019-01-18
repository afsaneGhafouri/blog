<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statics/{media}', 'StaticController@index')->middleware('check-data');


/// auth
Route::prefix('auth')->group(function () {
    Route::get('/login','UserController@loginForm')->middleware('redirect_authenticated');
    Route::post('/login','UserController@login')->middleware('redirect_authenticated');
    Route::get('/register','UserController@registerForm')->middleware('redirect_authenticated');
    Route::post('/register','UserController@register')->middleware('redirect_authenticated');
    Route::get('/profile','UserController@profile')->middleware('redirect_nonAuthenticated');
    Route::get('/logout','UserController@logout');
});

///admin
Route::prefix('admin')->group(function () {
    Route::get('/login',function () {
        return view('admins.auth.login_form');
    })->middleware('redirect_authenticatedAdmin');
    Route::post('/login','AdminController@login')->middleware('redirect_authenticatedAdmin');
    Route::get('/register',function () {
        return view('admins.auth.register_form');
    })->middleware('redirect_nonAuthenticatedAdmin');
    Route::post('/register','AdminController@register')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/profile','AdminController@profile')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/logout','AdminController@logout');
    Route::get('/posts/create','PostController@createForm')->middleware('redirect_nonAuthenticatedAdmin');
    Route::post('/posts/create','PostController@create')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/posts/{id}/update','PostController@updateForm')->middleware('redirect_nonAuthenticatedAdmin');
    Route::put('/posts/{id}/update','PostController@update')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/posts/management', 'PostController@manage')->middleware('redirect_nonAuthenticatedAdmin');

});


//post
Route::get('posts','PostController@list');
Route::get('/posts/{slug}','PostController@view');
Route::post('/posts/{id}/comment', 'PostController@addComment')->middleware('redirect_nonAuthenticated');


