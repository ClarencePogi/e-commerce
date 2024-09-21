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

Route::get('/no-access', function () {
    return view('authenticate.403');
});
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
Route::get('support', 'SupportController@index')->middleware('permission:users-read')->name('support.view');

Route::group(['prefix' => 'products'], function () {

    Route::get('', 'ProductController@index')->middleware('permission:product-read')->name('products.view');
    Route::post('', 'ProductController@store')->middleware('permission:product-create')->name('products.store');
    Route::get('/get', 'ProductController@get')->middleware('permission:product-read')->name('products.data');
    Route::delete('/delete', 'ProductController@delete')->middleware('permission:product-delete')->name('products.delete');
    Route::post('/update', 'ProductController@update')->middleware('permission:product-update')->name('products.update');
    Route::get('/orders', 'OrdersController@index')->middleware('permission:product-read')->name('orders.view');
    Route::get('/orders/get', 'OrdersController@get')->middleware('permission:product-read')->name('orders.get');
    Route::get('/get-featured', 'ProductController@getFeatured')->middleware('permission:product-read')->name('products.featured');
    Route::get('/get-product-by-date', 'ProductController@dateSort')->middleware('permission:product-read')->name('products.sortDate');

});

// -----------------------------------------------------------------------------------------
// USER ROUTING
Route::group(['prefix' => 'home'], function () {
    Route::get('/featured', 'FeaturedController@index')->middleware('permission:product-read')->name('featured');
    Route::get('/featured/color', 'ProductController@getColor')->middleware('permission:product-read')->name('product.color');
    Route::get('/featured/sort', 'ProductController@sorted')->middleware('permission:product-read')->name('product.sort');
    Route::get('/featured/product', 'ProductController@getProductByColor')->middleware('permission:product-read')->name('product.bycolor');
    Route::get('/featured/information', 'ProductController@getInformation')->middleware('permission:product-read')->name('product.info');
    Route::get('/featured/check-sale', 'OnsaleController@checkSale')->middleware('permission:product-read')->name('check.sale');
    Route::get('/orders', 'OrdersController@userOrders')->middleware('permission:product-read')->name('userOrders.view');

    // -----------------------------------------------------------------------------------------
    // DASHBOARD ROUTE
    Route::get('/dashboard', 'DashboardController@index')->middleware('permission:product-create')->name('dashboard.view');
    Route::get('/dashboard/categories', 'DashboardController@countCategories')->middleware('permission:product-create')->name('dashboard.countCategories');
    Route::get('/dashboard/product-counts', 'DashboardController@getCountProducts')->middleware('permission:product-create')->name('products.count');
    Route::get('/dashboard/purchased-counts', 'DashboardController@getCountPuechased')->middleware('permission:product-create')->name('purchased.count');
    Route::get('/dashboard/most-sales', 'OrdersController@getMostSale')->middleware('permission:product-create')->name('most.sale');
    Route::get('/dashboard/total-sales', 'DashboardController@getTotalSale')->middleware('permission:product-create')->name('total.sale');

});

// -----------------------------------------------------------------------------------------
// ORDERS ROUTING
Route::post('add/order', 'OrdersController@store')->middleware('permission:product-read')->name('order.store');
Route::get('get-discount/{id}', 'OnsaleController@getDiscount')->middleware('permission:product-read');

// -----------------------------------------------------------------------------------------
// ONSALE ROUTING

Route::post('add/onsale', 'OnsaleController@onsale.store')->name('onsale.store');
Route::get('add/onsale/all', 'OnsaleController@getAll')->name('onsale.all');


// -----------------------------------------------------------------------------------------
// MANAGEMENT ROUTE

Route::prefix('management')->group(function () {

    Route::get('/user', 'UserManagementController@index')->middleware('permission:users-read')->name('user.view');
    Route::get('/privilege', 'PrivilegeManagementController@index')->middleware('permission:privilege-read')->name('privilege.view');
    Route::get('/roles', 'UserManagementController@getRoles')->middleware('permission:users-read')->name('role.get');
    Route::post('/privilege/store', 'PrivilegeManagementController@createPrivilege')->middleware('permission:privilege-create')->name('privilege.store');
    Route::get('/privilege/get', 'PrivilegeManagementController@getPrivileges')->middleware('permission:privilege-read')->name('privilege.get');
    Route::get('/privilege/roles', 'UserManagementController@selectRole')->middleware('permission:privilege-read')->name('privilege.roles');
    Route::post('/user/create', 'UserManagementController@createUser')->middleware('permission:users-create')->name('user.store');
    Route::get('/user/find', 'UserManagementController@findUser')->middleware('permission:users-read')->name('user.find');
    Route::post('/user/update', 'UserManagementController@updateUser')->middleware('permission:users-update')->name('user.update');
    Route::get('/privilege/find', 'PrivilegeManagementController@findPrivilege')->middleware('permission:privilege-read')->name('privilege.find');
    Route::get('/permissions/get', 'PrivilegeManagementController@getPermissions')->middleware('permission:privilege-read')->name('permissions.get');
    Route::post('/privilege/update', 'PrivilegeManagementController@updatePrivilege')->middleware('permission:privilege-update')->name('privilege.update');
    Route::delete('/privilege/delete', 'PrivilegeManagementController@deleteRole')->middleware('permission:privilege-delete')->name('privilege.delete');

});

// ->middleware('permission:users-create,users-read,users-update,users-delete')
