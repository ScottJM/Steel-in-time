<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'admin' => 'AdminController',
]);

Route::post('products/delete-multiple', 'ProductController@deleteMultiple');
Route::post('metals/delete-multiple', 'MetalsController@deleteMultiple');
Route::post('cuts/delete-multiple', 'CutsController@deleteMultiple');
Route::post('orders/delete-multiple', 'OrdersController@deleteMultiple');
Route::post('coupons/delete-multiple', 'CouponsController@deleteMultiple');
Route::post('customers/delete-multiple', 'CustomersController@deleteMultiple');
Route::get('customers/postcode-search', 'CustomersController@postCodeSearch');
Route::get('customers/search', 'CustomersController@search');


Route::resource('products', 'ProductController');
Route::resource('metals', 'MetalsController');
Route::resource('cuts', 'CutsController');
Route::resource('orders', 'OrdersController');
Route::resource('coupons', 'CouponsController');
Route::resource('customers', 'CustomersController');


