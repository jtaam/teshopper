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

// Show products by category
Route::get('product-by-category/{category_id}', 'HomeController@product_by_category');

// Show products by brand
Route::get('product-by-brand/{brand_id}', 'HomeController@product_by_brand');

// Show product by id
Route::get('view-product/{product_id}', 'HomeController@product_by_id');

// Cart routes
Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'CartController@destroy');
Route::post('/update-cart', 'CartController@update_cart');

//-------------------
// Backend route
//-------------------
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'SuperAdminController@logout');

// Category
Route::get('/all-category', 'CategoryConntroller@index');
Route::get('/add-category', 'CategoryConntroller@create');
Route::post('/save-category', 'CategoryConntroller@save');
Route::get('/unpublish_category/{category_id}', 'CategoryConntroller@unpublish');
Route::get('/publish_category/{category_id}', 'CategoryConntroller@publish');
Route::get('/edit_category/{category_id}', 'CategoryConntroller@edit');
Route::post('/update-category/{category_id}', 'CategoryConntroller@update');
Route::get('/delete_category/{category_id}', 'CategoryConntroller@delete');

// Brands
Route::get('/all-brand', 'BrandConntroller@index');
Route::get('/add-brand', 'BrandConntroller@create');
Route::post('/save-brand', 'BrandConntroller@save');
Route::get('/unpublish_brand/{brand_id}', 'BrandConntroller@unpublish');
Route::get('/publish_brand/{brand_id}', 'BrandConntroller@publish');
Route::get('/edit_brand/{brand_id}', 'BrandConntroller@edit');
Route::post('/update-brand/{brand_id}', 'BrandConntroller@update');
Route::get('/delete_brand/{brand_id}', 'BrandConntroller@delete');

// Products
Route::get('add-product', 'ProductController@create');
Route::post('save-product', 'ProductController@save');
Route::get('all-product', 'ProductController@index');
Route::get('/unpublish_product/{product_id}', 'ProductController@unpublish');
Route::get('/publish_product/{product_id}', 'ProductController@publish');
Route::get('/edit_product/{product_id}', 'ProductController@edit');
Route::post('/update-product/{product_id}', 'ProductController@update');
Route::get('/delete_product/{product_id}', 'ProductController@delete');

// Sliders
Route::get('add-slider', 'SliderController@create');
Route::post('save-slider', 'SliderController@store');
Route::get('all-slider', 'SliderController@index');
Route::get('unpublish-slider/{slider_id}', 'SliderController@unpublish');
Route::get('publish-slider/{slider_id}', 'SliderController@publish');
Route::get('edit-slider/{slider_id}', 'SliderController@edit');
Route::post('update-slider/{slider_id}', 'SliderController@update');
Route::get('delete-slider/{slider_id}', 'SliderController@destroy');