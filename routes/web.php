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
Route::get('/', 'BooksController@index');
Route::get('friends', 'BooksController@friends');
Route::resource('books', 'BooksController');

// Route::get('/', 'ProjectsController@index');
// Route::get('/create', 'ProjectsController@create');
// Route::get('/w', function () {
//     return view('welcome');
// });
// Route::get('/{project}', 'ProjectsController@show');
// Route::post('/', 'ProjectsController@store');
// Route::get('/{project}/edit', 'ProjectsController@edit');
// Route::patch('/{project}', 'ProjectsController@update');
// Route::delete('/{project}', 'ProjectsController@destroy');
