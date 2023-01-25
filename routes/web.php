<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OfferController;
use App\Http\Middleware\Seller;
use App\Http\Middleware\Buyer;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Home Routes
         */
        Route::get('/', 'HomeController@index')->name('home.index');

        /**
         * Product Routes
         */
        Route::group(['middleware' => [Seller::class]], function() {
            Route::get('/product', 'ProductController@create')->name('product.create');
            Route::post('/product', 'ProductController@store')->name('product.store');
            Route::get('/offer', 'OfferController@index')->name('offer.index');
        });

        /**
         * Offer Routes
         */
        Route::group(['middleware' => [Buyer::class]], function() {
            Route::get('/offer/create/{product_id}', 'OfferController@create')->name('offer.create');
            Route::post('/offer', 'OfferController@store')->name('offer.store');
        });
        
        

        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});