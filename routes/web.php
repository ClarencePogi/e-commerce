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

Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Route::get('home', function () {
//     return view('home');
// });


// Authentication Routes

// Show login form
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

// Handle login
Route::post('login', 'Auth\LoginController@login');

// Handle logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Show registration form
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

// Handle registration
Route::post('register', 'Auth\RegisterController@register')->name('register.user');

Route::group(['prefix' => 'products'], function() {

    Route::get('','ProductController@index')->name('products.view');

    Route::post('','ProductController@store')->name('products.store');

    Route::get('/get', 'ProductController@get')->name('products.data');

    Route::delete('/delete', 'ProductController@delete')->name('products.delete');

    Route::post('/update', 'ProductController@update')->name('products.update');

    Route::get('/orders', 'OrdersController@index')->name('orders.view');

    Route::get('/orders/get', 'OrdersController@get')->name('orders.get');

    Route::get('/get-featured', 'ProductController@getFeatured')->name('products.featured');

    Route::get('/get-product-by-date', 'ProductController@dateSort')->name('products.sortDate');

});

// -----------------------------------------------------------------------------------------
// USER ROUTING


Route::group(['prefix' => 'home'], function() {

    Route::get('/featured', 'FeaturedController@index')->name('featured');

    Route::get('/featured/color', 'ProductController@getColor')->name('product.color');

    Route::get('/featured/sort', 'ProductController@sorted')->name('product.sort');

    Route::get('/featured/product', 'ProductController@getProductByColor')->name('product.bycolor');

    Route::get('/featured/information', 'ProductController@getInformation')->name('product.info');

    Route::get('', 'ProductController@search')->name('search');

    Route::get('/featured/check-sale', 'OnsaleController@checkSale')->name('check.sale');

    Route::get('/orders','OrdersController@userOrders')->name('userOrders.view');

});



// -----------------------------------------------------------------------------------------
// ORDERS ROUTING

Route::post('add/order', 'OrdersController@store')->name('order.store');

Route::get('get-discount/{id}', 'OnsaleController@getDiscount');


// -----------------------------------------------------------------------------------------
// ONSALE ROUTING

Route::post('add/onsale', 'OnsaleController@onsale.store')->name('onsale.store');

Route::get('add/onsale/all', 'OnsaleController@getAll')->name('onsale.all');

// -----------------------------------------------------------------------------------------
// DASHBOARD ROUTE

Route::get('home/dashboard', 'DashboardController@index')->name('dashboard.view');

Route::get('home/dashboard/categories', 'DashboardController@countCategories')->name('dashboard.countCategories');

Route::get('home/dashboard/product-counts', 'DashboardController@getCountProducts')->name('products.count');

Route::get('home/dashboard/purchased-counts', 'DashboardController@getCountPuechased')->name('purchased.count');

Route::get('home/dashboard/most-sales', 'OrdersController@getMostSale')->name('most.sale');

Route::get('home/dashboard/total-sales', 'DashboardController@getTotalSale')->name('total.sale');


// -----------------------------------------------------------------------------------------
// 404 ROUTE

Route::get('/no-access', function () {
    return view('authenticate.403');
});



