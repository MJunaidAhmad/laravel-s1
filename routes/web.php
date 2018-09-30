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


Route::get('/test', 'AuthenticationController@test');


Route::get('/login', 'AuthenticationController@logIn');
Route::get('/register', 'AuthenticationController@logIn');
Route::get('/logout', 'AuthenticationController@logIn');
Route::post('/login', 'AuthenticationController@logUserIn');
Route::get('/', 'AuthenticationController@logIn');
Route::get('/signup', 'AuthenticationController@signUp');
Route::post('/signup', 'AuthenticationController@signUserUp');

