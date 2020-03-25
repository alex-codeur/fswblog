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
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/{anypath}', 'HomeController@index')->where('path','.*');
Route::group(['middleware' => ['auth']], function() {
    // Category
    Route::get('/category', 'CategoryController@all_category');
    Route::post('/add-category', 'CategoryController@add_category');
    Route::get('/editCategory/{id}', 'CategoryController@edit_category');
    Route::patch('/update-category/{id}', 'CategoryController@update_category');
    Route::delete('/category/{id}', 'CategoryController@delete_category');
    Route::get('/deletecategory/{id}', 'CategoryController@selected_category');

    // Post
    Route::get('/post', 'PostController@all_post');
    Route::post('/savepost', 'PostController@save_post');
    Route::get('/post/{id}', 'PostController@edit_post');
    Route::patch('/update/{id}', 'PostController@update_post');
    Route::delete('/delete/{id}', 'PostController@delete_post');
});

Route::get('/blogpost', 'BlogController@get_all_blog_post');
Route::get('/singlepost/{id}', 'BlogController@getpost_by_id');
Route::get('/categories', 'BlogController@get_all_category');
Route::get('/categorypost/{id}', 'BlogController@get_all_post_by_cat_id');
Route::get('/search', 'BlogController@search_post');
Route::get('/latestpost', 'BlogController@latest_post');