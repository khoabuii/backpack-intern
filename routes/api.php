<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// auth
Route::group(['prefix'=>'auth'],function(){
    Route::post('login','Api\ApiController@login');
    Route::get('logout','Api\ApiController@logout');

    Route::group(['middleware'=>'auth:api'],function (){

        // categories
        Route::apiResource('categories','Api\CategoriesController');

        // users
        Route::get('users','Api\UsersController@index');
        Route::get('users/{id}','Api\UsersController@show');


        //categories child
        Route::apiResource('categories_child','Api\CategoriesChildController');

        // posts
        Route::apiResource('posts','Api\PostsController');
    });
});


