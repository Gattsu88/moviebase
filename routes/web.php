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

Auth::routes();

Route::group(['middleware' => ['is_active']], function() {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::resources(['/admin/posts' => 'AdminPostsController']);
});

Route::group(['middleware' => ['is_active', 'is_admin']], function() {
    Route::resources(['/admin/users' => 'AdminUsersController']);
});

Route::get('/', 'HomeController@index')->name('home');
