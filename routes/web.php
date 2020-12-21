<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Homepage\IndexController@index');
Route::get('/posts/{id}','Homepage\IndexController@viewPosts');
Route::get('/login','Homepage\IndexController@showLogin');
Route::post('/login','Homepage\IndexController@postLogin');

Route::get('/logout','Homepage\IndexController@logout');

Route::get('/register','Homepage\IndexController@showRegister');
Route::post('/register','Homepage\IndexController@postRegister');

Route::post('/comment/{id}','Homepage\IndexController@postComment');
