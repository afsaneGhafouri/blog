<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statics/{media}', 'StaticController@index')->middleware('check-data');


/// auth
Route::prefix('auth')->group(function () {
    Route::get('/login','UserController1@loginForm')->middleware('redirect_authenticated');
    Route::post('/login','UserController1@login')->middleware('redirect_authenticated');
    Route::get('/register','UserController1@registerForm')->middleware('redirect_authenticated');
    Route::post('/register','UserController1@register')->middleware('redirect_authenticated');
    Route::get('/profile','UserController1@profile')->middleware('redirect_nonAuthenticated');
    Route::get('/logout','UserController1@logout');
});

///admin
Route::prefix('admin')->group(function () {
    Route::get('/login',function () {
        return view('admins.auth.login_form');
    })->middleware('redirect_authenticatedAdmin');
    Route::post('/login','AdminController1@login')->middleware('redirect_authenticatedAdmin');
    Route::get('/register',function () {
        return view('admins.auth.register_form');
    })->middleware('redirect_nonAuthenticatedAdmin');
    Route::post('/register','AdminController1@register')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/profile','AdminController1@profile')->middleware('redirect_nonAuthenticatedAdmin');
    Route::get('/logout','AdminController1@logout');
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


