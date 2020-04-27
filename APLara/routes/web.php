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


Route::get('/','PostsController@index')->name('/');
Route::get('/create','PostsController@create')->name('create');
Route::post('/create','PostsController@store')->name('store');

Route::get('/delete/{id}', 'PostsController@destroy')->name('delete');

Route::get('/edit/{id}', 'PostsController@edit')->name('edit');
Route::put('/update/{id}', 'PostsController@update')->name('update');

Route::get('/rezerwacja', 'TrainingRegistryController@create')->name('rezerwacja');
Route::post('/rezerwacja', 'TrainingRegistryController@store')->name('storeOrder');

Route::get('/myOrders', 'myOrdersController@index')->name('myOrders');
Route::get('/editOrder/{id}', 'myOrdersController@edit')->name('editOrder');
Route::put('{id}', 'myOrdersController@update')->name('updateOrder');

Route::get('/adminPanel','AdminController@index')->name('adminPanel');
Route::get('/deleted/{id}', 'AdminController@destroy')->name('deleteOrder');

Route::get('/editAdmin/{id}', 'AdminController@edit')->name('editAdmin');
Route::put('/updateAdmin/{id}', 'AdminController@update')->name('updateAdmin');