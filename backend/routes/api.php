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

Route::middleware('auth:api')->get('promotions' , 'API\Promotion\PromotionController@index');
Route::middleware('auth:api')->get('promotions/now' , 'API\Promotion\PromotionController@promotionNow');
Route::middleware('auth:api')->get('promotions/{id}' , 'API\Promotion\PromotionController@show');