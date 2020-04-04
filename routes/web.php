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

// Route::redirect('/backend', 'home');

Route::namespace('Auth')->prefix('backend')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->prefix('backend')->group(function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::GET('/', 'ProfileController@index')->name('profile.index');
        Route::GET('edit', 'ProfileController@edit')->name('profile.edit');
        Route::PUT('update', 'ProfileController@update')->name('profile.update');
    });

    Route::resource('brand', 'BrandController');
    Route::resource('car', 'CarController');

    Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');

    Route::get('interested', 'InterestedController@index')->name('interested.index');

    Route::get('contact',  'ContactController@index')->name('contact.index');
    Route::get('contact/{contact}',  'ContactController@show')->name('contact.show');
    Route::get('contact/{contact}/edit',  'ContactController@edit')->name('contact.edit');

    Route::PATCH('sequence/up',   'SequenceController@up');
    Route::PATCH('sequence/down', 'SequenceController@down');

    Route::PATCH('wishlist/search',   'WishlistController@car_search_wishlist');
});

Route::view('/','index');
Route::view('/{any}','index');
Route::view('/{any}/{any1}', 'index');

