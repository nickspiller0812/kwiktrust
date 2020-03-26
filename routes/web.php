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

Route::get('/home', function() {
   return view('home');
});

Route::get('/', 'AppController@index');

Route::get('/auth/register', 'Auth\RegisterController@index');

Route::get('/auth/login', 'Auth\LoginController@index');

Route::post('/auth/register', 'Auth\RegisterController@create');

Route::post('/auth/login', 'Auth\LoginController@login');

Route::post('/file/upload', 'AppController@upload');

Route::post('/file/upload/folder', 'AppController@uploadFolder');


Route::get('/auth/logout', 'Auth\LoginController@logout');

Route::post('project/store', 'ProjectController@store');

Route::post('/category/create', 'CategoryController@create');

Route::post('/supplier/create', 'SupplierController@create');

Route::get('/projects/{id}', 'ProjectController@show');

Route::post('/folders/create', 'FolderController@create');

Route::get('/folders/{id}', 'FolderController@show');

