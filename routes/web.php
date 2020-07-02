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

Route::get('/', 'UserController@index');
Route::get('/login', 'UserController@login');
Route::get('user/activate/{id}/{hash}', 'UserController@activateUser');

Route::get('/home','UserController@home');
Route::post('/signup','UserController@signup');
Route::post('/loginuser','UserController@loginuser');
Route::post('/addnewproduct','ProductController@addnewproduct');

Route::get('/product','ProductController@product');
Route::get('/delete/{id}','ProductController@delete');

Route::middleware(['IsLogin'])->group(function () {

Route::get('/profile','UserController@profile');

Route::get('/addProduct','ProductController@addProduct');

Route::get('/myProduct','ProductController@myProduct');

Route::get('/productUpdate/{id}','ProductController@productUpdate');

Route::post('/update','ProductController@update');
Route::post('/addtocart','CartController@addtocart');
Route::post('/addtowish','WishController@addtowish');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/count','CartController@count');
Route::post('/remove','CartController@removeCart');
Route::get('/cart','CartController@cart');
});

Route::get('/logout', 'UserController@logout');
Route::get('/admin', 'AdminController@home');
Route::get('/admin/{any}', 'AdminController@home')->where("any",".*");

Route::get('/changePassword','UserController@showChangePasswordForm');
Route::get('/forgetPassword','UserController@forgetPassword');
Route::get('product/item/{id}','ProductController@item');
Route::get('order/details/{id}','CheckoutController@item');
Route::get('order','CheckoutController@order');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');
Route::post('/forgetPassword','UserController@password');
Route::post('/feedback','CheckoutController@feedback');

Route::get('/wishlist','WishController@wishlist');
Route::get('stripe', 'CheckoutController@stripe');
Route::post('stripe', 'CheckoutController@stripePost')->name('stripe.post');
