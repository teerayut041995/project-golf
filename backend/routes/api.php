<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\Auth\LoginController@login');
Route::get('logout', 'API\Auth\LoginController@logout')->middleware('auth:api');
Route::post('register', 'API\Auth\RegisterController@register');

Route::get('users' , 'API\User\UserController@index');
Route::get('test/notify' , 'TestNotifyController@index');



Route::get('promotions' , 'API\Promotion\PromotionController@index');
Route::get('promotions/now' , 'API\Promotion\PromotionController@now');
Route::get('promotions/active' , 'API\Promotion\PromotionController@index');
Route::get('promotions/{slug}' , 'API\Promotion\PromotionController@show');

Route::post('promotions/buy' , 'API\Promotion\PromotionOrderController@buy')->middleware('auth:api');
Route::get('promotions/orders/all' , 'API\Promotion\PromotionOrderController@index');
Route::get('promotions/orders/{id}' , 'API\Promotion\PromotionOrderController@order_detail');
Route::patch('promotions/orders/{id}' , 'API\Promotion\PromotionOrderController@update_payment');



// Route::middleware('auth:api')->get('promotions/{id}' , 'API\Promotion\PromotionController@show');

Route::get('activities/calendar' , 'API\Activity\ActivityController@calendar');
Route::get('activities/{slug}' , 'API\Activity\ActivityController@show');
Route::post('activities/buy' , 'API\Activity\ActivityOrderController@buy')->middleware('auth:api');

Route::get('activities/orders/all' , 'API\Activity\ActivityOrderController@index');
Route::get('activities/orders/{id}' , 'API\Activity\ActivityOrderController@order_detail');
Route::patch('activities/orders/{id}' , 'API\Activity\ActivityOrderController@update_payment');

Route::get('banks' , 'API\Bank\BankController@index');
