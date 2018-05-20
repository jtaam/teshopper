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
// Frontend route
Route::get('/', 'HomeController@index');






// Backend route
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');

// Category
Route::get('/all-category','CategoryConntroller@index');
Route::get('/add-category','CategoryConntroller@create');
Route::post('/save-category','CategoryConntroller@save');
