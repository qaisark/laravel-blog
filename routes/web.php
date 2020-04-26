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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/contact_us','PagesController@contact');
Route::resource('videos', 'VideoController');
Route::resource('documents', 'DocumentController');
Route::resource('articles', 'ArticlesController');
Route::resource('contact', 'ContactUsController');
Route::resource('category', 'CategoryController');
Route::resource('author', 'AuthorController');
Route::get('/contact','ContactUsController@index');
Route::get('/dashboard','DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
