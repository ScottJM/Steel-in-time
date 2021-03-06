<?php

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('template/{template}', 'TemplateController@show');
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('store/product/grades', 'Storefront\ProductController@grades');
Route::get('store/get-current-user', 'Storefront\AuthController@currentUser');
Route::post('store/auth', 'Storefront\AuthController@check');
Route::post('store/payment/make', 'Storefront\PaymentController@make');

Route::resource('store/product', 'Storefront\ProductController');
Route::resource('store/cart', 'Storefront\CartController');
Route::resource('store/metal', 'Storefront\MetalController');
Route::resource('store/cut', 'Storefront\CutController');
Route::resource('store/coupon', 'Storefront\CouponController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'store' => 'Storefront\IndexController',
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


