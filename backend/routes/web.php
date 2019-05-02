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
    return view('admin.index');
});

Route::get('/', 'Admin\HomeController@index');
Route::get('/admin/dashboard', 'Admin\HomeController@index');
Route::get('/auth/login', 'Admin\Auth\LoginController@index')->name('login');
Route::post('/auth/login', 'Admin\Auth\LoginController@login');
Route::get('/admin/logout', 'Admin\Auth\LoginController@logout')->middleware('auth');

Route::resource('/admin/banks', 'Admin\BankController');

Route::resource('/admin/users', 'Admin\UserController');

Route::resource('/admin/activities', 'Admin\ActivityController');
Route::get('/admin/orders/activities', 'Admin\ActivityOrderController@index');
Route::get('/admin/orders/activities/{id}', 'Admin\ActivityOrderController@show');
Route::patch('/admin/orders/activities/{id}', 'Admin\ActivityOrderController@update_payment');

Route::resource('/admin/promotions', 'Admin\PromotionController');
Route::get('/admin/orders/promotions', 'Admin\PromotionOrderController@index');
Route::get('/admin/orders/promotions/{id}', 'Admin\PromotionOrderController@show');
Route::patch('/admin/orders/promotions/{id}', 'Admin\PromotionOrderController@update_payment');

Route::get('/admin/notification/make-as-read', 'Admin\HomeController@make_as_read');
