<?php 

use App\Http\Route;
use App\Core\Core;

/**
| -------------------------------------------------------
|
| API Routes
|
| File with responsibility to define the API routes
|
| -------------------------------------------------------
*/

Route::get('/', 'HomeController@index');

Route::get('/api/todos',                   'TodoController@index');
Route::get('/api/todos/{id}/show',         'TodoController@fetchByID');

Route::post('/api/todos/create',           'TodoController@create');

Route::put('/api/todos/{id}/update',       'TodoController@update');
Route::put('/api/todos/{id}/updatestatus', 'TodoController@updateStatus');

Route::delete('/api/todos/{id}/remove',    'TodoController@remove');

Core::dispatch(Route::getRoutes());