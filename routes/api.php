<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/stores/id_category/{id_category}','Api\SubCategoryController@index_SubCategory');
Route::get('/stores','Api\SubCategoryController@index_SubCategory_all');
Route::get('search','Api\SubCategoryController@search_SubCategory');

Route::get('notifications/fcm_token/{fcm_token}', 'Api\NotificationController@add');




