<?php

use app\core\Route;

Route::get('/', 'HomeController@index');




//ROTAS USER
Route::get('/user/{id}', 'UserController@show');
Route::get('/user', 'UserController@index');
Route::put('/update', 'UserController@update');
Route::delete('/delete', 'UserController@delete');

//ROTAS REGISTER USER
Route::get('/register', 'UserController@register');
Route::post('/new-register', 'UserController@create');
Route::get('/forgot-password', 'UserController@forgot');
Route::get('/login', 'UserController@login');
Route::post('/auth', 'UserController@auth');



$core->dispatch(Route::getRoutes());
