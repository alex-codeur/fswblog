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

//Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

// Category
Route::get('/category', 'CategoryController@all_category');
Route::post('/add-category', 'CategoryController@add_category');
Route::get('/editCategory/{id}', 'CategoryController@edit_category');
Route::patch('/update-category/{id}', 'CategoryController@update_category');
Route::delete('/category/{id}', 'CategoryController@delete_category');

// Post
Route::get('/post', 'PostController@all_post');
Route::post('/savepost', 'PostController@save_post');
