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
// users
Route::get('users','Api\UsersController@index');
Route::get('users/{id}','Api\UsersController@show');

// categories
Route::apiResource('categories','Api\CategoriesController');

//categories child
Route::apiResource('categories_child','Api\CategoriesChildController');

// posts
Route::apiResource('posts','Api\PostsController');
