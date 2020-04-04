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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cars/{type?}', 'CarController@all');

Route::get('/car/{car}', 'CarController@detail');

Route::post('/cars', 'CarController@search');

Route::get('/random_car', 'CarController@random');

Route::get('/brands', 'BrandController@all');

Route::get('/brands_select', 'BrandController@select');
Route::get('/brand_model/{model}', 'BrandController@model');
Route::get('/brand_year/{model}', 'BrandController@year');
Route::get('/brand_gear/{model}', 'BrandController@gear');

Route::get('/color', 'ColorController@color');

Route::post('/contact', 'ContactController@store');

Route::post('/interested', 'InterestedController@store');
Route::post('/wishlist', 'WishlistController@store');


