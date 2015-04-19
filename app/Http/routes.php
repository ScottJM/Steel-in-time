<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

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


Route::resource('products', 'ProductController');
Route::resource('metals', 'MetalsController');
Route::resource('cuts', 'CutsController');
Route::resource('orders', 'OrdersController');
Route::resource('coupons', 'CouponsController');


