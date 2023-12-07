<?php

use app\core\Route;

Route::get('/', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/register', 'UserController@create');
Route::put('/userupdate', 'UserController@update');
Route::delete('/userdelete', 'UserController@delete');

$core->dispatch(Route::getRoutes());
