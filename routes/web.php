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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/project-store', 'HomeController@store');
Route::delete('/home/{id}', 'HomeController@delete');

//Route::resource('/');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::delete('/project/{id}', 'AdminController@delete'); //for delete
    Route::get('/{id}/view', 'AdminController@view'); //for view detail
    Route::get('/{id}/edit', 'AdminController@edit'); //for edit
    Route::post('/{id}/edit', 'AdminController@editaction'); //for edit
});

