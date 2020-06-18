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

Route::get('/', 'Front\PostController@index');
Route::middleware(['auth'])->get('/posts/create', 'Admin\PostController@create');
Route::middleware(['auth'])->post('/posts/create', 'Admin\PostController@store');
Route::get('/posts/{post}', 'Front\PostController@show');
Route::middleware(['auth', 'user.content'])->delete('/posts/{post}', 'Admin\PostController@delete');
Route::middleware(['auth', 'user.content'])->get('/posts/{post}/edit', 'Admin\PostController@edit');
Route::middleware(['auth', 'user.content'])->put('/posts/{post}/edit', 'Admin\PostController@update');
Route::post('/posts/{post}/comments/create', 'Front\CommentController@store');

Route::get('/admin', 'Admin\PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
