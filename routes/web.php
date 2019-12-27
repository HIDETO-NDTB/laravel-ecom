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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/product/{product}',[
    'uses' => 'FrontEndController@single',
    'as' => 'product.single'
]);

Route::get('/cart',[
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::post('/cart/add',[
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'add_to_cart'
]);

Route::get('/cart/incr/{id}/{qty}',[
    'uses' => 'ShoppingController@cart_incr',
    'as' => 'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}',[
    'uses' => 'ShoppingController@cart_decr',
    'as' => 'cart.decr'
]);

Route::get('/cart/{id}',[
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/rapid_add/{id}',[
    'uses' => 'ShoppingController@rapid_add',
    'as' =>'rapid_cart_add'

]);

Route::get('/cart_checkout',[
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart_checkout',[
    'uses' => 'CheckoutController@payment',
    'as' => 'cart.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('products','ProductController');
