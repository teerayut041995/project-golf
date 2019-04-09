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
Route::resource('/admin/activities', 'Admin\ActivityController');
Route::resource('/admin/promotions', 'Admin\PromotionController');