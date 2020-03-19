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

Route::get('/', 'PagesController@index');

Route::resource('/posts', 'PostsController');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts/{post}/like', 'LikesController@store')->name('likes.like');
Route::delete('/posts/{post}/unlike', 'LikesController@destroy')->name('likes.unlike');
Route::post('/posts/{post}/comments', 'CommentsController@store')->name('posts.comments.store');
