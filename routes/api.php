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



Route::get("/admin/getusers","AdminController@getusers");
Route::get("/admin/getproducts","AdminController@getproducts");
Route::get("/admin/deleteprod/{id}","AdminController@deleteprod");
Route::get("/admin/acceptprod/{id}","AdminController@acceptprod");
Route::post("/admin/blockuser","AdminController@blockuser");