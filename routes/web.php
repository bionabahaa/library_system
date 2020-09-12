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

Route::get('/', function () {
    return view('welcome');
});



Route::namespace('Library_System')->group(function () {

    //categories
    Route::get('/categories','CategoryController@index')->name('categories');
    Route::get('/categories/create','CategoryController@create')->name('create_categories');
    Route::post('/categories/store','CategoryController@store')->name('store_categories');


    //publishers
    Route::get('/publishers','PublisherController@index')->name('publishers');
    Route::get('/publishers/create','PublisherController@create')->name('create_publishers');
    Route::post('/publishers/store','PublisherController@store')->name('store_publishers');


    //books
    Route::get('/books','BookController@index')->name('books');
    Route::get('/books/create','BookController@create')->name('create_books');
    Route::post('/books/create','BookController@store')->name('store_books');
    Route::get('/books/edit/{id}','BookController@edit')->name('edit_books');
    Route::post('/books/update/{id}','BookController@update')->name('update_books');
    Route::get('/books/search','BookController@searchBooks')->name('search_books');


});




