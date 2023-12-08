<?php

use app\core\Route;

Route::get('/', 'HomeController@index');




//ROTAS USER
Route::get('/user/{id}', 'UserController@show');
Route::get('/user', 'UserController@index');
Route::put('/update', 'UserController@update');
Route::delete('/delete', 'UserController@delete');

//ROTAS REGISTER USER
Route::get('/register', 'RegisterController@index');
Route::post('/create', 'RegisterController@store');

Route::get('/forgot-password', 'UserController@forgot');

Route::get('/login', 'LoginController@index');
Route::post('/auth', 'LoginController@login');
Route::get('/logout', 'LoginController@destroy');



$core->dispatch(Route::getRoutes());
