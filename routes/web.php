<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//----------------
// Frontend route
//----------------
Route::get('/', 'HomeController@index');





//-------------------
// Backend route
//-------------------
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');

// Category
Route::get('/all-category','CategoryConntroller@index');
Route::get('/add-category','CategoryConntroller@create');
Route::post('/save-category','CategoryConntroller@save');
Route::get('/unpublish_category/{category_id}','CategoryConntroller@unpublish');
Route::get('/publish_category/{category_id}','CategoryConntroller@publish');
Route::get('/edit_category/{category_id}','CategoryConntroller@edit');
Route::post('/update-category/{category_id}','CategoryConntroller@update');
Route::get('/delete_category/{category_id}','CategoryConntroller@delete');

// Brands
Route::get('/all-brand','BrandConntroller@index');
Route::get('/add-brand','BrandConntroller@create');
Route::post('/save-brand','BrandConntroller@save');
Route::get('/unpublish_brand/{brand_id}','BrandConntroller@unpublish');
Route::get('/publish_brand/{brand_id}','BrandConntroller@publish');
Route::get('/edit_brand/{brand_id}','BrandConntroller@edit');
Route::post('/update-brand/{brand_id}','BrandConntroller@update');
Route::get('/delete_brand/{brand_id}','BrandConntroller@delete');

// Products
Route::get('add-product','ProductController@create');
Route::post('save-product','ProductController@save');
Route::get('all-product','ProductController@index');
Route::get('/unpublish_product/{product_id}','ProductController@unpublish');
Route::get('/publish_product/{product_id}','ProductController@publish');
Route::get('/edit_product/{product_id}','ProductController@edit');
Route::post('/update-product/{product_id}','ProductController@update');
Route::get('/delete_product/{product_id}','ProductController@delete');