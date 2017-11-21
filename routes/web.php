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

Route::get('/', 'PagesController@index');
Auth::routes();
  Route::prefix('admin')->group(function () {
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index' )->name('admin.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products', 'ProductsController');

Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile');
